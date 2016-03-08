@extends('layouts.auth')

@section('title', 'Login &mdash; myLegacy')

@section('heading', 'Login &mdash; myLegacy')

@section('content')
    {!! Form::open() !!}
    <div class="form-group">
        {!! Form::label('email') !!}
        {!! Form::text('email', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>
        </div>
    </div>
    {!! Form::Submit('Login', ['class'=>'btn btn-primary']) !!}
    <a href="{{route('auth.password.email')}}" class="small">Forgot password?</a>
    {!! Form::close() !!}
@endsection