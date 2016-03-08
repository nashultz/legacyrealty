@extends('layouts.backend')

@section('title', 'Delete '.$listing->name)

@section('content')
    {!! Form::open([
        'method'=>'delete',
        'route'=>['mylegacy.listings.destroy',$listing->id]
    ]) !!}
    <div class="alert alert-danger">
        <strong>Warning!</strong> You are about to delete an listing. This action cannot be undone. Are you sure you want to continue?
    </div>

    {!! Form::submit('Yes, delete this listing!',['class'=>'btn btn-danger']) !!}
    <a href="{{route('mylegacy.listings.index')}}" class="btn btn-success">
        <strong>No</strong>, get me out of here!
    </a>
    {!! Form::close() !!}
@endsection