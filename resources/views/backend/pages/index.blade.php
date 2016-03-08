@extends('layouts.backend')

@section('title', 'Pages')

@section('content')
    <a class="btn btn-success" href="{{route('mylegacy.pages.create')}}"><i class="fa fa-fw fa-book"></i> Create New Page</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>URI</th>
            <th>Name</th>
            <th>Template</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @if($pages->isEmpty())
            <tr><td colspan="5" align="center">There are no pages to show.</td></tr>
        @else
            @foreach($pages as $page)
                <tr>
                    <th>
                        {!! $page->linkToPaddedTitle(route('mylegacy.pages.edit', $page->id)) !!}
                    </th>
                    <th><a href="{{url($page->uri)}}">{{$page->pretty_uri}}</a></th>
                    <th>{{$page->name or 'None'}}</th>
                    <th>{{$page->template or 'None'}}</th>
                    <th>
                        <a href="{{route('mylegacy.pages.edit', $page->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                    </th>
                    <th>
                        <a href="{{route('mylegacy.pages.confirm', $page->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                    </th>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection