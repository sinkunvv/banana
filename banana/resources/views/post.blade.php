@extends('layouts.master')
{!! header('Content-Type: image/png') !!}
@section('content')
    <div class="row">
        <div class="6u 12u(narrower)">
            <img src={{$theme_img->encode('data-url')}} alt="" />
            <img src={{$smart_img->encode('data-url')}} alt="" />
            <img src={{$stupid_img->encode('data-url')}} alt="" />
        </div>
    </div>
@endsection