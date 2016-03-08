@extends('layouts.backend')

@section('title', $office->exists ? 'Edit '.$office->name : 'Create New Office')

@section('content')
    {!! Form::model($office, [
        'method'=>$office->exists ? 'put' : 'post',
        'route'=>$office->exists ? ['mylegacy.offices.update', $office->id] : ['mylegacy.offices.store']
    ]) !!}
    {!! form::hidden('published','0') !!}
    {!! form::hidden('protected','0') !!}
    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('address') !!}
        {!! Form::text('address', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('city') !!}
        {!! Form::text('city',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('state') !!}
        {!! Form::text('state',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('zip') !!}
        {!! Form::text('zip',null, ['class'=>'form-control']) !!}
    </div>
    {!! Form::submit($office->exists ? 'Save Office' : 'Create New Office', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection