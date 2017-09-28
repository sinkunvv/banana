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
            <img src={{asset('/img/base.png')}} width="30%" height="30%" alt="" />
            <img src={{asset('/img/test.png')}} width="30%" height="30%" alt="" />
        </div>

        {!! Form::open(['accept-charset' => 'UTF-8', 'url' => 'create', 'files' => 'true']) !!}
            <div class="row 50%">
                <div class="12u">
                    {!! Form::label('お題：(250x250pxまで)') !!}
                    {!! Form::file('obj_img') !!}
                </div>
            </div>
            <div class="row 50%">
                <div class="12u">
                    {!! Form::label('頭のいい人の場合')!!}
                    {!! Form::input('text', 'smart_think_1', null, ['class' => 'form-control', 'placeholder' => '頭のいい考えをかこう...']) !!}
                    {!! Form::input('text', 'smart_think_2', null, ['class' => 'form-control']) !!}
                    {!! Form::input('text', 'smart_think_3', null, ['class' => 'form-control']) !!}
                    {!! Form::input('text', 'smart_think_4', null, ['class' => 'form-control']) !!}
                    {!! Form::input('text', 'smart_think_5', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row 50%">
                <div class="12u">
                    {!! Form::label('頭の悪い人の場合')!!}
                    {!! Form::input('text', 'stupid_think', null, ['class' => 'form-control', 'placeholder' => 'ばばな', 'value' => "{{Input::old('stupid_think')}}"]) !!}
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
@endsection
