@extends('layouts.backend')

@section('title', 'Delete '.$testimony->name)

@section('content')
    {!! Form::open([
        'method'=>'delete',
        'route'=>['mylegacy.testimonies.destroy',$testimony->id]
    ]) !!}
    <div class="alert alert-danger">
        <strong>Warning!</strong> You are about to delete a testimony. This action cannot be undone. Are you sure you want to continue?
    </div>

    {!! Form::submit('Yes, delete this testimony!',['class'=>'btn btn-danger']) !!}
    <a href="{{route('mylegacy.testimonies.index')}}" class="btn btn-success">
        <strong>No</strong>, get me out of here!
    </a>
    {!! Form::close() !!}
@endsection