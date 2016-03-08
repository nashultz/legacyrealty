@extends('layouts.auth')

@section('title', 'Reset Password &mdash; myLegacy')

@section('heading', 'Reset Password &mdash; myLegacy')

@section('content')
    {!! Form::open() !!}
    <div class="form-group">
        {!! Form::label('email') !!}
        {!! Form::text('email', null, ['class'=>'form-control']) !!}
    </div>
    {!! Form::Submit('Send Password Reset Link', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection