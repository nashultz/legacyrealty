@extends('layouts.backend')

@section('title', 'Users')

@section('content')
<div id="vjs-users">
    <div class="row" v-if="errors.length > 0">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <strong>We found some errors!</strong>
                <div v-for="error in errors">
                    <ul>
                        <li v-for="value in error">
                            @{{ value }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-if="message.length > 0">
        <div class="col-md-12">
            <div class="alert alert-@{{ message.status }}">
                <strong>We found some errors!</strong>
                <ul>
                    <li> @{{ message.text }}</li>
                </ul>
                <span class="alert-close" @click="clearError"><i class="fa fa-close"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <a class="btn btn-success" @click="currentView='users-create-view'"><i class="fa fa-fw fa-user-plus"></i> Create New User</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="user in users">
                    <th><a href="#">@{{user.name}}</a></th>
                    <th>@{{user.email}}</th>
                    <th>
                        <a href="#"><i class="fa fa-fw fa-edit"></i></a>
                    </th>
                    <th>
                        <a href="#"><i class="fa fa-fw fa-trash"></i></a>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-lg-6">
        <component :is="currentView"></component>
    </div>
</div>
<template id="create-new-user">
    <h3>Create New User</h3>
    <form @submit="createNewUser">
        {{csrf_field()}}
        <div class="form-group">
            {!! Form::label('name') !!}
            {!! Form::text('name',null,['class'=>'form-control', 'v-model'=>'user.name']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email') !!}
            {!! Form::email('email',null,['class'=>'form-control', 'v-model'=>'user.email']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password') !!}
            {!! Form::password('password', ['class'=>'form-control', 'v-model'=>'user.password']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation') !!}
            {!! Form::password('password_confirmation', ['class'=>'form-control', 'v-model'=>'user.password_confirmation']) !!}
        </div>
        {!! Form::submit('Create New User',['class'=>'btn btn-success']) !!}
    </form>
</template>
@endsection

@section('footer')
    <script src="{{theme('js/vjs_user.js')}}"></script>
@endsection