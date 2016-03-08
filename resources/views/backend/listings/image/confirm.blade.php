@extends('layouts.backend')

@section('title', 'Delete '.$image->name)

@section('content')
    {!! Form::open([
        'method'=>'delete',
        'route'=>['mylegacy.listings.{listing}.images.destroy',$listing->id,$image->id]
    ]) !!}
    <div class="alert alert-danger">
        <strong>Warning!</strong> You are about to delete an image. This action cannot be undone. Are you sure you want to continue?
    </div>

    {!! Form::submit('Yes, delete this image!',['class'=>'btn btn-danger']) !!}
    <a href="{{route('mylegacy.listings.{listing}.images.index',$listing->id)}}" class="btn btn-success">
        <strong>No</strong>, get me out of here!
    </a>
    {!! Form::close() !!}
@endsection