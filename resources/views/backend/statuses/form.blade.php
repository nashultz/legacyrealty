@extends('layouts.backend')

@section('title', $status->exists ? 'Edit '.$status->name : 'Create New Status')

@section('content')
    {!! Form::model($status, [
        'method'=>$status->exists ? 'put' : 'post',
        'route'=>$status->exists ? ['mylegacy.statuses.update', $status->id] : ['mylegacy.statuses.store']
    ]) !!}
    {!! form::hidden('published','0') !!}
    {!! form::hidden('protected','0') !!}
    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    {!! Form::submit($status->exists ? 'Save Status' : 'Create New Status', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection