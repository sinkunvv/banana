@extends('layouts.master')

@section('content')
    <section>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <header>
            <h3>メーカー</h3>
        </header>
        <div class="row">
            <div class="6u 12u(narrower)">
                <img src={{asset('/img/test1.png')}} alt="" />
                <img src={{asset('/img/test2.png')}} alt="" />
                <img src={{asset('/img/test3.png')}} alt="" />
            </div>

            <div class="6u 12u(narrower)">
                <section>
                    {!! Form::open(['files' => 'true']) !!}
                        <div class="row 50%">
                            <div class="12u">
                                {!! Form::label('お題：(250x250pxまで)') !!}
                                {!! Form::text('this_theme', null, ['class' => 'form-control', 'placeholder' => 'お題を入力']) !!}
                                {!! Form::file('obj_img') !!}
                            </div>
                        </div>
                        <div class="row 50%">
                            <div class="12u">
                                {!! Form::label('頭のいい人の場合')!!}
                                @for ($i=1;$i<=8;$i++)
                                    {!! Form::text('smart_think[]', null, ['class' => 'form-control', 'placeholder' => '頭のいい考えをかこう...']) !!}
                                @endfor
                            </div>
                        </div>
                        <div class="row 50%">
                            <div class="12u">
                                {!! Form::label('頭の悪い人の場合')!!}
                                {!! Form::text('stupid_think', null, ['class' => 'form-control', 'placeholder' => 'ばばな']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="12u">
                                <ul class="buttons">
                                    <li>{!! Form::submit('じっこう', ['class' => 'special']) !!}</li>
                                </ul>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </section>
            </div>
     </section>
@endsection
