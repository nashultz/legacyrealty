@extends('layouts.backend')

@section('title', $state->exists ? 'Edit '.$state->name : 'Create New State')

@section('content')
    {!! Form::model($state, [
        'method'=>$state->exists ? 'put' : 'post',
        'route'=>$state->exists ? ['mylegacy.states.update', $state->id] : ['mylegacy.states.store']
    ]) !!}
    {!! form::hidden('published','0') !!}
    {!! form::hidden('protected','0') !!}
    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    {!! Form::submit($state->exists ? 'Save State' : 'Create New State', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection