@extends('layouts.backend')

@section('title', 'Delete '.$subtype->name)

@section('content')
    {!! Form::open([
        'method'=>'delete',
        'route'=>['mylegacy.subtypes.destroy',$subtype->id]
    ]) !!}
    <div class="alert alert-danger">
        <strong>Warning!</strong> You are about to delete a subtype. This action cannot be undone. Are you sure you want to continue?
    </div>

    {!! Form::submit('Yes, delete this subtype!',['class'=>'btn btn-danger']) !!}
    <a href="{{route('mylegacy.subtypes.index')}}" class="btn btn-success">
        <strong>No</strong>, get me out of here!
    </a>
    {!! Form::close() !!}
@endsection