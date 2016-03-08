@extends('layouts.backend')

@section('title', 'Create New Image')

@section('content')
    {!! Form::model($image, [
        'method'=>'post',
        'route'=>['mylegacy.employees.{employee}.images.store',$employee->id],
        'files'=>true,
        'class'=>'dropzone'
    ]) !!}
    {!! Form::close() !!}
@endsection