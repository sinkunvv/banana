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
        // upload object image
        //$obj_img = \Image::make($request->file('obj_img'));
        $obj_img = \Image::make('img/obj.png');
        // theme on base
        $this->this_theme($theme, $obj_img);
        // smart think
        $this->smart_think($smart, $obj_img);
        // stupid think
        $this->stupid_think($stupid, $obj_img);

        return redirect('/');
        //return view('index');
    }

    private function this_theme($theme, $obj) {
        $img = \Image::make('img/theme.png');
        $img->text($theme, 190, 220, function($font) {
            $font->file(public_path('fonts/ipagp.ttf'));
            $font->size(16);
            $font->align('center');
            $font->color('#000000');
        });
        $obj->fit(80,80); // max 80x80 resize
        $img->insert($obj, 'top-left', 140, 90); // theme obj
        $img->save('img/test1.png');
    }

    private function smart_think($smart, $obj) {
        // create back img
        $back = \Image::make('img/smart.png');
        $img = \Image::canvas(500,500);

        for ($i=0;$i<count($smart); $i++) {
        //for ($i=0;$i<8; $i++) {
            $cnt[] = $i;
        }

        foreach ($smart as $key => $value) {
        //for ($key=0;$key<8; $key++) {
            switch ($cnt[$key]) {

                case 0: // 7 length
                    $wt = 165;
                    $ht = 120;
                    $size = 40;
                    break;
                case 1: // 9 length
                    $wt = 340;
                    $ht = 80;
                    $size = 35;
                    break;
                case 2: // 9 length
                    $wt = 270;
                    $ht = 200;
                    $size = 45;
                    break;
                case 3: // 8 length
                    $wt = 350;
                    $ht = 290;
                    $size = 40;
                    break;
                case 4: // 6 length
                    $wt = 340;
                    $ht = 360;
                    $size = 37;
                    break;
                case 5: // 10 length
                    $wt = 280;
                    $ht = 150;
                    $size = 28;
                        break;
                case 6: // 10 length
                    $wt = 320;
                    $ht = 250;
                    $size = 26;
                    break;
                case 7: // 8 length
                    $wt = 320;
                    $ht = 420;
                    $size = 35;
                    break;
                default:
                    $wt = 0;
                    $ht = 0;
                    $size = 0;
                    break;
            }

            // back img on smart think
            $img->text($value, $wt, $ht, function($font) use ($size){
                $font->file(public_path('fonts\ipagp.ttf'));
                $font->size($size);
                $font->align('center');
                $font->color('#000000');
            });
        }

        // resize back img
        $img->resize(230, 230, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $obj->fit(50,50);
        $back->insert($obj, 'top-left', 50, 175); // smart pepole obj
        $back->insert($img, 'top-left', 130, 0); // smart pepole obj
        $back->save('img/test2.png');
    }

    private function stupid_think($stupid, $obj) {
        $back = \Image::make('img/stupid.png');
        $img = \Image::canvas(200,600);
        $wh_orgin = $wh = 10;
        $ht = 110;
        $stupid_arr = preg_split("//u", $stupid, -1, PREG_SPLIT_NO_EMPTY);
        $cnt = mb_strlen($stupid);

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
        $img->resize(70, 225, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });


        switch ($cnt) {
            case 1:
            case 2:
                $ht = 70;
                break;
            case 3:
                $ht = 50;
                break;
            default:
                $ht = 0;
                break;
        }

        $obj->fit(50,50);
        $back->insert($obj, 'bottom-left', 50, 5); // stupid pepole obj
        $back->insert($img, 'bottom-right', 10, $ht); // stupid think img
        $back->save('img/test3.png');
    }

}
