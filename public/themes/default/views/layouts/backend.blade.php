<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') &mdash; myLegacy - Legacy Realty, Inc.</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300italic" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">

    <!-- Styles -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">
    <link href="{{theme('css/metisMenu.css')}}" rel="stylesheet" type="text/css">
    <link href="{{theme('css/sb-admin-2.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ theme('css/backend.css') }}" rel="stylesheet" type="text/css">

    <!-- JavaScripts -->
    <script src="{{ theme('js/all.js') }}"></script>
    <script src="{{ theme('js/sb-admin-2.js') }}"></script>
    <script src="{{ theme('js/metisMenu.js') }}"></script>

    <!-- Dropzone -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-73232216-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body>
<div id="wrapper">
    <!--Navigation-->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom:0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">myLegacy</a>
        </div> <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>-->
                    <li><a href="{{route('auth.logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li><a href="{{route('backend.dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                    <li>
                        <a href="#"><i class="fa fa-book fa-fw"></i> Pages<span class="fa fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('mylegacy.pages.index')}}">All Pages</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('mylegacy.users.index')}}">All Users</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user-secret fa-fw"></i> Employees<span class="fa fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('mylegacy.employees.index')}}">All Employees</a>
                                <a href="{{route('mylegacy.offices.index')}}">All Offices</a>
                                <a href="{{route('mylegacy.titles.index')}}">All Titles</a>
                                <a href="{{route('mylegacy.specialties.index')}}">All Specialties</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-tasks fa-fw"></i> Listings<span class="fa fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('mylegacy.listings.index')}}">All Listings</a>
                                <a href="{{route('mylegacy.statuses.index')}}">Statuses</a>
                                <a href="{{route('mylegacy.cities.index')}}">Cities</a>
                                <a href="{{route('mylegacy.counties.index')}}">Counties</a>
                                <a href="{{route('mylegacy.states.index')}}">States</a>
                                <a href="{{route('mylegacy.types.index')}}">Types</a>
                                <a href="{{route('mylegacy.subtypes.index')}}">Subtypes</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-comments fa-fw"></i> Testimonies<span class="fa fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('mylegacy.testimonies.index')}}">All Testimonies</a>
                            </li>
                        </ul>
                    </li>
                    <!--MORE LINKS HERE-->
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-wrapper">
        @if($status)
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info">{{$status}}</div>
                </div>
            </div>
        @endif
        <h3>@yield('title')</h3>
        @if (count($errors) > 0)
            <div class="row"><div class="col-md-12">
                    <div class="alert alert-danger">
                        <strong>We found some errors!</strong>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div></div>
        @endif
        @yield('content')
        <div class="clearfix"></div>&nbsp;<div class="clearfix"></div>
    </div>
</div>
</body>
</html>
