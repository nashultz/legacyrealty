@extends('layouts.backend')

@section('title','Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                <h4>Analytics</h4>
                <li class="list-group-item">
                    <h5>Total Visits</h5>
                    {{$stats['total_visits']}}
                </li>
                <li class="list-group-item">
                    <h5>Pages</h5>
                    <ul class="list-group">
                        @foreach($stats['pages'] as $p)
                            <li class="list-group-item">{{$p['url']}}<span class="pull-right">{{$p['pageViews']}}</span></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <ul class="list-group">
                <h4>Recent Users</h4>
                @foreach($users as $u)
                    <li class="list-group-item">
                        <h5>{{$u->name}}</h5>
                        Last login: {{$u->last_login_difference}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection