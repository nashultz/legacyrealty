@extends('layouts.backend')

@section('title', 'Delete '.$office->name)

@section('content')
    {!! Form::open([
        'method'=>'delete',
        'route'=>['mylegacy.offices.destroy',$office->id]
    ]) !!}
    <div class="alert alert-danger">
        <strong>Warning!</strong> You are about to delete a office. This action cannot be undone. Are you sure you want to continue?
    </div>

    {!! Form::submit('Yes, delete this office!',['class'=>'btn btn-danger']) !!}
    <a href="{{route('mylegacy.offices.index')}}" class="btn btn-success">
        <strong>No</strong>, get me out of here!
    </a>
    {!! Form::close() !!}
@endsection