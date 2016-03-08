@extends('layouts.backend')

@section('title', 'Delete '.$title->name)

@section('content')
    {!! Form::open([
        'method'=>'delete',
        'route'=>['mylegacy.users.destroy',$title->id]
    ]) !!}
    <div class="alert alert-danger">
        <strong>Warning!</strong> You are about to delete a title. This action cannot be undone. Are you sure you want to continue?
    </div>

    {!! Form::submit('Yes, delete this title!',['class'=>'btn btn-danger']) !!}
    <a href="{{route('mylegacy.titles.index')}}" class="btn btn-success">
        <strong>No</strong>, get me out of here!
    </a>
    {!! Form::close() !!}
@endsection