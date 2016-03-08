<nav class="navbar navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="menu navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{route('site.home')}}" title="Home">Home</a></li>
                <li><a href="{{route('site.properties')}}" title="Our Properties">Properties</a></li>
                @include('partials.navigation')
                <li><a href="{{route('site.agents')}}" title="Meet Our Team">Our Agents</a></li>
                <!--<li><a href="#" title="Get in Touch">Contact Us</a></li>-->
            </ul>
        </div>
    </div>
</nav>