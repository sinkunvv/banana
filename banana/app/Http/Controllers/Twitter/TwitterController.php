<?php

namespace App\Http\Controllers\Twitter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Twitter;


class TwitterController extends Controller
{
    public function sign_in(Request $request)
    {
        $sign_in_twitter = true;
        $force_login = false;

        // Make sure we make this request w/o tokens, overwrite the default values in case of login.
        Twitter::reconfig(['token' => '', 'secret' => '']);
        $token = Twitter::getRequestToken(route('twitter.callback'));

        if (isset($token['oauth_token_secret']))
        {
        $url = Twitter::getAuthorizeURL($token, $sign_in_twitter, $force_login);
        $status = $request->post('status');
        $theme = $request->post('theme');
        $smart = $request->post('smart');
        $stupid = $request->post('stupid');
        $request->session()->put('theme', $theme);
        $request->session()->put('smart', $smart);
        $request->session()->put('stupid', $stupid);

        $request->session()->put('oauth_state', 'start');
        $request->session()->put('oauth_request_token', $token['oauth_token']);
        $request->session()->put('oauth_request_token_secret', $token['oauth_token_secret']);
        $request->session()->put('status', $status);
        return redirect()->to($url);
	}

	return redirect()->route('maker.index');
    }

    public function callback(Request $request)
    {
        if ($request->session()->has('oauth_request_token'))
        {
            $request_token = [
                'token'  => $request->session()->get('oauth_request_token'),
                'secret' => $request->session()->get('oauth_request_token_secret'),
            ];

            Twitter::reconfig($request_token);
            $oauth_verifier = false;

            if ($request->has('oauth_verifier'))
            {
                $oauth_verifier = $request->get('oauth_verifier');
                // getAccessToken() will reset the token for you
                $token = Twitter::getAccessToken($oauth_verifier);
            }

            if (!isset($token['oauth_token_secret']))
            {
                return redirect()->route('maker.index')->with('flash_error', 'We could not log you in on Twitter.');
            }

            $credentials = Twitter::getCredentials();

            if (is_object($credentials) && !isset($credentials->error))
            {
                $request->session()->put('access_token', $token);
                return redirect()->route('twitter.post');
            }
            return redirect()->route('maker.index')->with('flash_error', 'Crab! Something went wrong while signing you up!');
        }
    }

    public function post(Request $request) {
        $status = $request->session()->get('status');
        $theme = \Image::make($request->session()->get('theme'));
        $smart = \Image::make($request->session()->get('smart'));
        $stupid = \Image::make($request->session()->get('stupid'));

        $theme_img = Twitter::uploadMedia(['media' => $theme->encode('png')]);
        $smart_img = Twitter::uploadMedia(['media' => $smart->encode('png')]);
        $stupid_img = Twitter::uploadMedia(['media' => $stupid->encode('png')]);

        Twitter::postTweet([
                 'status' => $status
                ,'format' => 'json'
                ,'media_ids' => $theme_img->media_id_string
                           .','.$smart_img->media_id_string
                           .','.$stupid_img->media_id_string
            ]);

        // session delete
        $request->session()->flush();
        return redirect('/');
    }
}
