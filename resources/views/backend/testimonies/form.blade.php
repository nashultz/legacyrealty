@extends('layouts.backend')

@section('title', $testimony->exists ? 'Edit '.$testimony->name : 'Create New Testimony')

@section('content')
    {!! Form::model($testimony, [
        'method'=>$testimony->exists ? 'put' : 'post',
        'route'=>$testimony->exists ? ['mylegacy.testimonies.update', $testimony->id] : ['mylegacy.testimonies.store']
    ]) !!}
    {!! form::hidden('published','0') !!}
    {!! form::hidden('featured','0') !!}
    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::checkbox('published','1') !!} Publish?
        </div>
        <div class="col-md-3">
            {!! Form::checkbox('featured','1') !!} Featured?
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    </div>
    {!! Form::submit($testimony->exists ? 'Save Testimony' : 'Create New Testimony', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
    <script>
        new SimpleMDE().render();
    </script>
@endsection