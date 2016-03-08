@extends('layouts.backend')

@section('title', 'Delete '.$state->name)

@section('content')
    {!! Form::open([
        'method'=>'delete',
        'route'=>['mylegacy.states.destroy',$state->id]
    ]) !!}
    <div class="alert alert-danger">
        <strong>Warning!</strong> You are about to delete a state. This action cannot be undone. Are you sure you want to continue?
    </div>

    {!! Form::submit('Yes, delete this state!',['class'=>'btn btn-danger']) !!}
    <a href="{{route('mylegacy.states.index')}}" class="btn btn-success">
        <strong>No</strong>, get me out of here!
    </a>
    {!! Form::close() !!}
@endsection