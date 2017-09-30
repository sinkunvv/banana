<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BananaController extends Controller
{
    // create img
    public function create(Request $request) {
        // validate image only
        // $request->validate([
        //     'this_theme' => 'required|between:1,15',
        //     'obj_img' => 'required|image|dimensions:max_width=256,max_height=256|max:3000',
        //     'smart_think.*' => 'required|between:1,10',
        //     'stupid_think' => 'required|between:1,5|kana',
        // ]);
        $theme = $request->input('this_theme');
        $stupid = $request->input('stupid_think');
        $smart = $request->input('smart_think');
        // base & theme image create
        $obj_img = \Image::make($request->file('obj_img'));
        $base_img = \Image::make('img/base.png');

        // theme on base
        $base_img = $this->this_theme($theme, $base_img);
        // smart think
        $smart_img = $this->smart_think($smart);
        // stupid think
        $stupid_cnt = mb_strlen($stupid);
        $stupid_img = $this->stupid_think($stupid, $stupid_cnt);

        // image mixing
        $base_img = $this->mix_img($base_img, $obj_img, $smart_img, $stupid_img, $stupid_cnt);
        $base_img->save('img/test.png');
        return redirect('/');
        //return view('index');
    }

    private function this_theme($theme, $base) {
        //$img = \Image::canvas(700,50,'#fff000');

        $base->text($theme, 190, 240, function($font) {
            $font->file(public_path('fonts\ipagp.ttf'));
            $font->size(16);
            $font->align('center');
            $font->color('#ff0000');
        });

        return $base;
    }

    private function smart_think($smart) {
        // create back img
        $back = \Image::canvas(500,500);
        for ($i=1;$i<=count($smart); $i++) {
            $cnt[] = $i;
        }
        // rand postion
        //shuffle($cnt);

        foreach ($smart as $key => $value) {
            switch ($cnt[$key]) {
                case 1:
                    $wt = 40;
                    $ht = 45;
                    $size = 25;
                    break;
                case 2:
                    $wt = 175;
                    $ht = 75;
                    $size = 25;
                    break;
                case 3:
                    $wt = 310;
                    $ht = 60;
                    $size = 25;
                    break;
                case 4:
                    $wt = 15;
                    $ht = 105;
                    $size = 25;
                    break;
                case 5:
                    $wt = 150;
                    $ht = 145;
                    $size = 30;
                    break;
                case 6:
                    $wt = 250;
                    $ht = 110;
                    $size = 20;
                    break;
                case 7:
                    $wt = 55;
                    $ht = 190;
                    $size = 40;
                    break;
                case 8:
                    $wt = 265;
                    $ht = 195;
                    $size = 35;
                    break;
                case 9:
                    $wt = 165;
                    $ht = 240;
                    $size = 40;
                    break;
                case 10:
                    $wt = 290;
                    $ht = 275;
                    $size = 25;
                    break;
                case 11:
                    $wt = 190;
                    $ht = 310;
                    $size = 22  ;
                    break;
                case 12:
                    $wt = 220;
                    $ht = 360;
                    $size = 30;
                    break;
                case 13:
                    $wt = 180;
                    $ht = 425;
                    $size = 25;
                    break;
                case 14:
                    $wt = 320;
                    $ht = 460;
                    $size = 25;
                    break;
                default:
                    $wt = 9999;
                    $ht = 9999;
                    $size = 0;
                    break;
            }

            // back img on smart think
            $back->text($value, $wt, $ht, function($font) use ($size){
                $font->file(public_path('fonts\ipagp.ttf'));
                $font->size($size);
                $font->color('#000000');
            });
        }

        // resize back img
        $back->resize(225, 225, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        return $back;
    }

    private function stupid_think($stupid, $cnt) {
        $img = \Image::canvas(200,600);
        $wh_orgin = $wh = 10;
        $ht = 110;
        $stupid_arr = preg_split("//u", $stupid, -1, PREG_SPLIT_NO_EMPTY);

        if($cnt<3){
            $img->resize(200,250);
        }

        foreach ($stupid_arr as $str) {
            $img->text($str, $wh, $ht, function($font) {
                $font->file(public_path('fonts\iori_font.ttf'));
                $font->size(125);
                $font->color('#000000');
            });
            if($wh <= $wh_orgin) {
                $wh += rand(20,30);
            }else{
                $wh -= rand(10,15);
            }
            $ht += 115;
        }
        $img->trim();
        $img->resize(70, 210, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        return $img;
    }

    private function mix_img($base, $obj, $smart, $stupid, $stupid_cnt) {
        $stupid_ht = 0;
        if($stupid_cnt <= 3){
            $stupid_ht = 50;
        }

        //theme image on base image
        $obj->fit(80,80); // max 80x80 resize
        $base->insert($obj, 'top-left', 140, 110); // theme obj
        $obj->fit(50,50); // max 50x50 resize
        $base->insert($obj, 'top-left', 50, 430); // smart pepole obj
        $base->insert($obj, 'bottom-left', 50, 0); // stupid pepole obj
        $base->insert($smart, 'top-left', 145, 255); // smart think img
        $base->insert($stupid, 'bottom-right', 10, $stupid_ht); // stupid think img
        return $base;
    }

}
