@extends('layouts.backend')

@section('title', $specialty->exists ? 'Edit '.$specialty->name : 'Create New Specialty')

@section('content')
    {!! Form::model($specialty, [
        'method'=>$specialty->exists ? 'put' : 'post',
        'route'=>$specialty->exists ? ['mylegacy.specialties.update', $specialty->id] : ['mylegacy.specialties.store']
    ]) !!}
    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    {!! Form::submit($specialty->exists ? 'Save Specialty' : 'Create New Specialty', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection