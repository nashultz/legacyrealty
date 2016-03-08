@extends('layouts.backend')

@section('title', 'Delete '.$status->name)

@section('content')
    {!! Form::open([
        'method'=>'delete',
        'route'=>['mylegacy.statuses.destroy',$status->id]
    ]) !!}
    <div class="alert alert-danger">
        <strong>Warning!</strong> You are about to delete a status. This action cannot be undone. Are you sure you want to continue?
    </div>

    {!! Form::submit('Yes, delete this status!',['class'=>'btn btn-danger']) !!}
    <a href="{{route('mylegacy.statuses.index')}}" class="btn btn-success">
        <strong>No</strong>, get me out of here!
    </a>
    {!! Form::close() !!}
@endsection