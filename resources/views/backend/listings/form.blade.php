@extends('layouts.backend')

@section('title', $listing->exists ? 'Edit '.$listing->title : 'Create New Listing')

@section('content')
    {!! Form::model($listing, [
        'method'=>$listing->exists ? 'put' : 'post',
        'route'=>$listing->exists ? ['mylegacy.listings.update', $listing->id] : ['mylegacy.listings.store']
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
        <div class="clearfix"></div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::label('status_id','Status') !!}
            {!! Form::select('status_id',$lstat,null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('title') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('summary') !!}
        {!! Form::textarea('summary', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description') !!}
        {!! Form::textarea('description',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('address') !!}
        {!! Form::text('address',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::label('city_id','City') !!}
            {!! Form::select('city_id',$lcity,null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::label('county_id','County') !!}
            {!! Form::select('county_id',$lcounty,23, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::label('state_id','State') !!}
            {!! Form::select('state_id',$lstate,4, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('zipcode') !!}
        {!! Form::text('zipcode',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::label('type_id','Type') !!}
            {!! Form::select('type_id',$ltype,null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::label('subtype_id','Subtype') !!}
            {!! Form::select('subtype_id',$lsubtype,null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('price') !!}
        {!! Form::text('price',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('agent_id', 'Agent') !!}
            {!! Form::select('agent_id',$agents,null, ['class'=>'form-control']) !!}
        </div>
    </div>
    {!! Form::submit($listing->exists ? 'Save Listing' : 'Create New Listing', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
    <script>
        $('textarea').each(function() {
            var simplemde = new SimpleMDE({
                element: this,
            });
            simplemde.render();
        })
    </script>
@endsection