<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BananaController extends Controller
{
    // create img
    public function create(Request $request) {
        // validate image only
        $request->validate([
            'obj_img' => 'required|image|dimensions:max_width=256,max_height=256|max:3000',
            'stupid_think' => 'required|between:1,5|kana',
        ]);
        $stupid = $request->input('stupid_think');
        // base & theme image create
        $obj_img = \Image::make($request->file('obj_img'));
        //$obj_img = \Image::make('img/obj.png');
        $base_img = \Image::make('img/base.png');

        //theme image on base image
        $obj_img->fit(80,80); // max 80x80 resize
        $base_img->insert($obj_img, 'top-left', 140, 110); // theme
        $obj_img->fit(50,50); // max 50x50 resize
        $base_img->insert($obj_img, 'top-left', 50, 430); // smart pepole
        $base_img->insert($obj_img, 'bottom-left', 50, 0); // stupid pepole

        // stupid think
        $stupid_arr = preg_split("//u", $stupid, -1, PREG_SPLIT_NO_EMPTY);
        $stupid_cnt = mb_strlen($stupid) <3 ? 3 : mb_strlen($stupid);

        $wh_orgin = $wh = 270;
        $ht = mb_strlen($stupid) <3 ? 565 : 550;
        define("size", 205/$stupid_cnt);
        //$size = 200/$stupid_cnt;
        //dd($font_size);
        foreach ($stupid_arr as $str) {
            $base_img->text($str, $wh, $ht, function($font) {
                $font->file(public_path('fonts\iori_font.ttf'));
                $font->size(size);
                $font->color('#000000');
            });
            if($wh <= $wh_orgin) {
                $wh += 20;
            }else{
                $wh -=20;
            }
            $ht += size;
        }

        $base_img->save('img/test.png');
        //$obj_img->save('img/obj.png');
        return redirect('/');
        //return view('index');
    }
}
