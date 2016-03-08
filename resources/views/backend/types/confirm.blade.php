@extends('layouts.backend')

@section('title', 'Delete '.$type->name)

@section('content')
    {!! Form::open([
        'method'=>'delete',
        'route'=>['mylegacy.types.destroy',$type->id]
    ]) !!}
    <div class="alert alert-danger">
        <strong>Warning!</strong> You are about to delete a type. This action cannot be undone. Are you sure you want to continue?
    </div>

    {!! Form::submit('Yes, delete this type!',['class'=>'btn btn-danger']) !!}
    <a href="{{route('mylegacy.types.index')}}" class="btn btn-success">
        <strong>No</strong>, get me out of here!
    </a>
    {!! Form::close() !!}
@endsection