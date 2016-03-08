<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') &mdash; Legacy Realty, Inc.</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300italic" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">

    <!-- Styles -->

    <link href="{{ theme('css/backend.css') }}" rel="stylesheet" type="text/css">

    <!-- JQuery -->

    <script src="{{theme('js/all.js')}}"></script>
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
<div class="container">
    @if($status)
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-info">{{$status}}</div>
            </div>
        </div>
    @endif
    <div class="row vertical-center">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-{{ $errors->any() ? 'danger' : 'default' }}">
                <div class="panel-heading">
                    <h2 class="panel-title">@yield('heading')</h2>
                </div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>We found some errors!</strong>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    Legacy Realty, Inc. &copy; {!! date('Y') !!} All Rights Reserved. Design by <a href="http://nathonshultz.com">Nathon Shultz</a>.
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
