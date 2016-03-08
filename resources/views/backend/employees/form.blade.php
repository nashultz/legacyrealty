@extends('layouts.backend')

@section('title', $employee->exists ? 'Edit '.$employee->name : 'Create New Employee')

@section('content')
    {!! Form::model($employee, [
        'method'=>$employee->exists ? 'put' : 'post',
        'route'=>$employee->exists ? ['mylegacy.employees.update', $employee->id] : ['mylegacy.employees.store']
    ]) !!}
    {!! form::hidden('published','0') !!}
    {!! form::hidden('protected','0') !!}
    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email') !!}
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone') !!}
        {!! Form::text('phone',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('cell') !!}
        {!! Form::text('cell',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fax') !!}
        {!! Form::text('fax',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('bio') !!}
        {!! Form::textarea('bio',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('office_id','Office') !!}
        {!! Form::select('office_id',$offices,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('title_id','Title') !!}
        {!! Form::select('title_id',$titles,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('specialty_id','Specialty') !!}
        {!! Form::select('specialty_id',$specialties,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::checkbox('published','1') !!} Publish?
        </div>
        <div class="col-md-3">
            {!! Form::checkbox('protected','1') !!} Protected?
        </div>
    </div>
    {!! Form::submit($employee->exists ? 'Save Employee' : 'Create New Employee', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
    <script>
        new SimpleMDE().render();
    </script>
@endsection