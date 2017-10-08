@extends('layouts.master')
{!! header('Content-Type: image/png') !!}
@section('content')
    <div class="row">
        <div class="6u 12u(narrower)">
            <img src={{$theme_img->encode('data-url')}} alt="" />
            <img src={{$smart_img->encode('data-url')}} alt="" />
            <img src={{$stupid_img->encode('data-url')}} alt="" />
        </div>
        <div class="6u 12u(narrower)">
            <header>
                <h3>Twitter</h3>
            </header>
            <section>
                {!! Form::open(['method' => 'post', 'url'=>'share']) !!}
                <div class="row 50%">
                    <div class="12u">
                        {!! Form::label('画像付きでツイート！')!!}
                        {!! Form::textarea('status', $status, ['class' => 'form-control', 'rows' => '3']) !!}
                        {{Form::hidden('theme', $theme_img->encode('data-url'), ['id' => 'theme'])}}
                        {{Form::hidden('smart', $smart_img->encode('data-url'), ['id' => 'smart'])}}
                        {{Form::hidden('stupid', $stupid_img->encode('data-url'), ['id' => 'stupid'])}}
                    </div>
                    <ul class="buttons">
                        <li>{!! Form::submit('ついーと？', ['class' => 'button small special']) !!}</li>
                        <li><a href="/" class="button small">戻る</a></li>
                    </ul>
                    <div class="adsence">
                        <h1>スポンサーリンク</h1>
                        <!-- admax -->
                        <script src="//adm.shinobi.jp/s/1f2aeb158e6ec90f70a0e5b5601dd7ad"></script>
                        <!-- admax -->
                    </div>
                    <div class='hint'>Hint：お題の画像は正方形だときれいに見えます</div>
                </div>
                {!! Form::close() !!}

            </section>
            <footer>
                <ul class="buttons">

                </ul>
            </footer>
        </div>
    </div>
@endsection
