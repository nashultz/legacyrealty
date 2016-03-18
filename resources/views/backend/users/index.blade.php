@extends('layouts.backend')

@section('title', 'Users')

@section('content')
<div id="vjs-users">
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
        {!! Form::text('name',null,['class'=>'form-control', 'v-model'=>'user.name']) !!}
    </form>
</template>
@endsection

@section('footer')
    <script src="{{theme('js/vjs_user.js')}}"></script>
@endsection