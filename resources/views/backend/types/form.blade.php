@extends('layouts.backend')

@section('title', $type->exists ? 'Edit '.$type->name : 'Create New Type')

@section('content')
    {!! Form::model($type, [
        'method'=>$type->exists ? 'put' : 'post',
        'route'=>$type->exists ? ['mylegacy.types.update', $type->id] : ['mylegacy.types.store']
    ]) !!}
    {!! form::hidden('published','0') !!}
    {!! form::hidden('protected','0') !!}
    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    {!! Form::submit($type->exists ? 'Save Type' : 'Create New Type', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection