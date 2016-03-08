@extends('layouts.backend')

@section('title', $county->exists ? 'Edit '.$county->name : 'Create New County')

@section('content')
    {!! Form::model($county, [
        'method'=>$county->exists ? 'put' : 'post',
        'route'=>$county->exists ? ['mylegacy.counties.update', $county->id] : ['mylegacy.counties.store']
    ]) !!}
    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    {!! Form::submit($county->exists ? 'Save County' : 'Create New County', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection