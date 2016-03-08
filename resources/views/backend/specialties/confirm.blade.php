@extends('layouts.backend')

@section('title', 'Delete '.$specialty->name)

@section('content')
    {!! Form::open([
        'method'=>'delete',
        'route'=>['mylegacy.specialties.destroy',$specialty->id]
    ]) !!}
    <div class="alert alert-danger">
        <strong>Warning!</strong> You are about to delete a specialty. This action cannot be undone. Are you sure you want to continue?
    </div>

    {!! Form::submit('Yes, delete this specialty!',['class'=>'btn btn-danger']) !!}
    <a href="{{route('mylegacy.specialties.index')}}" class="btn btn-success">
        <strong>No</strong>, get me out of here!
    </a>
    {!! Form::close() !!}
@endsection