@extends('layouts.backend')

@section('title', 'Delete '.$county->name)

@section('content')
    {!! Form::open([
        'method'=>'delete',
        'route'=>['mylegacy.counties.destroy',$county->id]
    ]) !!}
    <div class="alert alert-danger">
        <strong>Warning!</strong> You are about to delete a county. This action cannot be undone. Are you sure you want to continue?
    </div>

    {!! Form::submit('Yes, delete this county!',['class'=>'btn btn-danger']) !!}
    <a href="{{route('mylegacy.counties.index')}}" class="btn btn-success">
        <strong>No</strong>, get me out of here!
    </a>
    {!! Form::close() !!}
@endsection