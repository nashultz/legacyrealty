@extends('layouts.backend')

@section('title', 'Create New Image')

@section('content')
    {!! Form::model($image, [
        'method'=>'post',
        'route'=>['mylegacy.listings.{listing}.images.store',$listing->id],
        'files'=>true,
        'class'=>'dropzone'
    ]) !!}
    {!! Form::close() !!}
@endsection