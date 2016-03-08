@extends('layouts.backend')

@section('title', $subtype->exists ? 'Edit '.$subtype->name : 'Create New Subtype')

@section('content')
    {!! Form::model($subtype, [
        'method'=>$subtype->exists ? 'put' : 'post',
        'route'=>$subtype->exists ? ['mylegacy.subtypes.update', $subtype->id] : ['mylegacy.subtypes.store']
    ]) !!}
    {!! form::hidden('published','0') !!}
    {!! form::hidden('protected','0') !!}
    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    {!! Form::submit($subtype->exists ? 'Save Subtype' : 'Create New Subtype', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection