@extends('layouts.backend')

@section('title', 'Delete '.$page->title)

@section('content')
    {!! Form::open([
        'method'=>'delete',
        'route'=>['mylegacy.pages.destroy',$page->id]
    ]) !!}
    <div class="alert alert-danger">
        <strong>Warning!</strong> You are about to delete a page. This action cannot be undone. Are you sure you want to continue?
    </div>

    {!! Form::submit('Yes, delete this page!',['class'=>'btn btn-danger']) !!}
    <a href="{{route('mylegacy.pages.index')}}" class="btn btn-success">
        <strong>No</strong>, get me out of here!
    </a>
    {!! Form::close() !!}
@endsection