@extends('layouts.backend')

@section('title', 'Listings')

@section('content')
    <a class="btn btn-success" href="{{route('mylegacy.listings.create')}}"><i class="fa fa-fw fa-tasks"></i> Create New Listing</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Address</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listings as $listing)
            <tr>
                <th><a href="{{route('mylegacy.listings.edit', $listing->id)}}">{{$listing->title}}</a></th>
                <th>{{$listing->address}}, {{$listing->city}}, {{$listing->state}}</th>
                <th>
                    <a href={{route('mylegacy.listings.{listing}.images.index',$listing->id)}}>Images</a>
                </th>
                <th>
                    <a href="{{route('mylegacy.listings.edit', $listing->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                </th>
                <th>
                    <a href="{{route('mylegacy.listings.confirm', $listing->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $listings->render() !!}
@endsection