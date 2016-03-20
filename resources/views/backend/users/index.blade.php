@extends('layouts.backend')

@section('title', 'Users')

@section('content')
<div id="vjs-users">
    <div class="row" v-if="errors.length > 0">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="clearErrors"><span aria-hidden="true">&times;</span></button>
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
    <div class="row" v-if="messages.length > 0" v-for="message in messages">
        <div class="col-md-12">
            <div class="alert alert-@{{ message.status }} alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="clearMessages"><span aria-hidden="true">&times;</span></button>
                <strong>@{{ message.status | capitalize }}</strong>!
                <div>
                    @{{ message.text }}
                </div>
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
                    <th><a @click="currentView='users-edit-view'" v-bind:userid="user.id">@{{user.name}}</a></th>
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
        <component :is="currentView" ></component>
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
<template id="update-existing-user">
    <div   v-for="usr in u">
        <h3>Edit User: @{{ u.name }}</h3>
        <form @submit="updateUser">
        {{csrf_field()}}
        <div class="form-group">
            {!! Form::label('name') !!}
            {!! Form::text('name',null,['class'=>'form-control', 'v-model'=>'usr.name']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email') !!}
            {!! Form::email('email',null,['class'=>'form-control', 'v-model'=>'usr.email']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password') !!}
            {!! Form::password('password', ['class'=>'form-control', 'v-model'=>'usr.password']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation') !!}
            {!! Form::password('password_confirmation', ['class'=>'form-control', 'v-model'=>'usr.password_confirmation']) !!}
        </div>
        {!! Form::submit('Update User',['class'=>'btn btn-success']) !!}
        </form>
    </div>
</template>
@endsection

@section('footer')
    <script src="{{theme('js/vjs_user.js')}}"></script>
@endsection