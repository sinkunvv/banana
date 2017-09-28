<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BananaController extends Controller
{
    // create img
    public function create(Request $request) {
        $post = $request->post();
        //dd($post);
        $image = $request->file('image');
        $upload = $image->move('media');

        $img = \Image::make('img/base.png');
        // write text at position
        $img->text("ち", 675, 1400, function($font) {
            $font->file(public_path('fonts\iori_font.ttf'));
            $font->size(150);
            $font->color('#000000');
        });
        $img->text("ん", 700, 1550, function($font) {
            $font->file(public_path('fonts\iori_font.ttf'));
            $font->size(150);
            $font->color('#000000');
        });
        $img->text("こ", 675, 1700, function($font) {
            $font->file(public_path('fonts\iori_font.ttf'));
            $font->size(150);
            $font->color('#000000');
        });
        $img->save('img/test.png');
        return view('index');
    }
}
