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
        <div class="content">
            <section>
                <div class='sample_img'>
                    <img src={{asset('/img/theme.png')}} alt="" class='sample_img'/>
                    <img src={{asset('/img/smart.png')}} alt="" class='sample_img'/>
                    <img src={{asset('/img/stupid.png')}} alt="" class='sample_img'/>
                </div>
                {!! Form::open(['files' => 'true', 'url'=>'generate']) !!}
                    <div class="row 50%">
                        <div class="12u">
                            {!! Form::label('お題：(500x500pxまで)') !!}
                            {!! Form::text('this_theme', null, ['class' => 'form-control', 'placeholder' => '例えば○○を見た時']) !!}
                            {!! Form::file('obj_img') !!}
                        </div>
                    </div>
                    <div class="row 50%">
                        <div class="12u">
                            {!! Form::label('頭のいい人の場合')!!}
                            @for ($i=1;$i<=8;$i++)
                                @if ($i<=5)
                                    {!! Form::text('smart_think[]', null, ['class' => 'form-control', 'placeholder' => '必須入力です..']) !!}
                                @else
                                    {!! Form::text('smart_think[]', null, ['class' => 'form-control']) !!}
                                @endif
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

                                <li>{!! Form::submit('じっこう', ['id' => 'submit-btn', 'class' => 'special']) !!}</li>
                            </ul>
                        </div>
                    </div>
                {!! Form::close() !!}
            </section>
        </div>
     </section>
@endsection
