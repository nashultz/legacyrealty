@extends('layouts.backend')

@section('title', 'Delete '.$employee->name)

@section('content')
    {!! Form::open([
        'method'=>'delete',
        'route'=>['mylegacy.employees.destroy',$employee->id]
    ]) !!}
    <div class="alert alert-danger">
        <strong>Warning!</strong> You are about to delete an employee. This action cannot be undone. Are you sure you want to continue?
    </div>

    {!! Form::submit('Yes, delete this employee!',['class'=>'btn btn-danger']) !!}
    <a href="{{route('mylegacy.employees.index')}}" class="btn btn-success">
        <strong>No</strong>, get me out of here!
    </a>
    {!! Form::close() !!}
@endsection