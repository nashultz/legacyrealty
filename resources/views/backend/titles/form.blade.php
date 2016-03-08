@extends('layouts.backend')

@section('title', $title->exists ? 'Edit '.$title->name : 'Create New Title')

@section('content')
    {!! Form::model($title, [
        'method'=>$title->exists ? 'put' : 'post',
        'route'=>$title->exists ? ['mylegacy.titles.update', $title->id] : ['mylegacy.titles.store']
    ]) !!}
    {!! form::hidden('published','0') !!}
    {!! form::hidden('protected','0') !!}
    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    {!! Form::submit($title->exists ? 'Save Title' : 'Create New Title', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection