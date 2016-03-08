<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Legacy Realty, Inc. &ndash; Your Legacy Starts Here!</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300italic" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">

    <!-- Styles -->

    <link href="{{ theme('css/frontend.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ theme('css/twitter-styles.css') }}" rel="stylesheet" type="text/css">

    <!-- Javascript -->

    <script src="{{theme('js/all.js')}}"></script>
    <script src="{{theme('js/twitter-feed.js')}}"></script>
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
<div class="header-wrapper">
    <div class="topMenu">
        <div class="container">
            <div class="col-md-6 pull-left">
                <div class="topContact">
                    <ul>
                        <li><i class="fa fa-fw fa-envelope"></i> info@legacyrlty.com</li>
                        <li class="vdivider2"></li>
                        <li><i class="fa fa-fw fa-phone"></i> 501 450 7303</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 pull-right">
                <div class="socialMedia">
                    <ul class="pull-right">
                        <li><a href="https://twitter.com/legacyrlty"><i class="fa fa-fw fa-twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/legacyrlty/"><i class="fa fa-fw fa-facebook"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/legacy-realty-inc-"><i class="fa fa-fw fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <header>
        <div class="container">
            <div id="logo" class="col-md-6">
                <img src="{{theme('img/logo.jpg')}}" />
                <h1>Legacy Realty, Inc.</h1>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </header>
    @include('frontend.mainnav')
</div>
@yield('content')

<div class="footer-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="legacy-info">
                        <h3>Legacy Realty, Inc.</h3>
                        <div class="legacy-location">
                            <li class="tagline">Your Legacy Starts Here!</li>
                            <li class="divider"></li>
                            <li class=""><i class="fa fa-fw fa-map-marker"></i> 2115 Washington Ave</li>
                            <li class=""><i class="fa fa-fw"></i> Suite D</li>
                            <li class=""><i class="fa fa-fw"></i> Conway, AR 72032</li>
                            <li class="secdivider"></li>
                            <li class=""><i class="fa fa-fw fa-phone"></i> 501 450 7303</li>
                            <li class=""><i class="fa fa-fw fa-fax"></i> 501 450 9203</li>
                            <li class=""><i class="fa fa-fw fa-envelope"></i> info@legacyrlty.com</li>
                        </div>
                        <div class="divider"></div>
                        <h4>Connect with Us!</h4>
                        <div class="legacy-social">
                            <li class=""><a href="https://www.facebook.com/legacyrlty/"><i class="fa fa-fw fa-facebook"></i></a><span class="vdivider"></span><a href="https://twitter.com/legacyrlty"><i class="fa fa-fw fa-twitter"></i></a><span class="vdivider"></span><a href="https://www.linkedin.com/company/legacy-realty-inc-"><i class="fa fa-fw fa-linkedin"></i></a></li>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="posts">
                        <h4>Recent Posts</h4>
                        <div id="twitter-feed" class="posts"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                        <h4>Useful Links</h4>
                        <div class="">
                            <li><a href="/" title="Home">Home</a></li>
                            <li><a href="{{route('site.properties')}}" title="Real Estate Listings">Properties</a></li>
                            <!--<li><a href="#" title="Get in Touch">Contact Us</a></li>-->
                            <li><a href="{{route('site.agents')}}" title="Meet Our Team">Our Agents</a></li>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    Legacy Realty, Inc. &copy; {!! date('Y') !!} All Rights Reserved. Made with <i class="fa fa-fw fa-heart-o red"></i> by <a href="http://nathonshultz.com">Nathon Shultz</a>.
                </div>
            </div>
        </div>
    </div>
</div>

@yield('footer')
</body>
</html>
