@extends('layouts.backend')

@section('title', 'Delete '.$city->name)

@section('content')
    {!! Form::open([
        'method'=>'delete',
        'route'=>['mylegacy.cities.destroy',$city->id]
    ]) !!}
    <div class="alert alert-danger">
        <strong>Warning!</strong> You are about to delete a city. This action cannot be undone. Are you sure you want to continue?
    </div>

    {!! Form::submit('Yes, delete this city!',['class'=>'btn btn-danger']) !!}
    <a href="{{route('mylegacy.cities.index')}}" class="btn btn-success">
        <strong>No</strong>, get me out of here!
    </a>
    {!! Form::close() !!}
@endsection