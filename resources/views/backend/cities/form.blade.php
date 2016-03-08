@extends('layouts.backend')

@section('title', $city->exists ? 'Edit '.$city->name : 'Create New City')

@section('content')
    {!! Form::model($city, [
        'method'=>$city->exists ? 'put' : 'post',
        'route'=>$city->exists ? ['mylegacy.cities.update', $city->id] : ['mylegacy.cities.store']
    ]) !!}
    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    {!! Form::submit($city->exists ? 'Save City' : 'Create New City', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection