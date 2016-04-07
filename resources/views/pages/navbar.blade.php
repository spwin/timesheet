<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ action('DefaultController@index') }}">{{ trans('messages.page') }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="lang-flag"><a href="{{ action('DefaultController@language', ['lang' => 'lt']) }}"><img src="{{ URL::to('/') }}/css/images/LITH0001.GIF"></a></li>
                <li class="lang-flag"><a href="{{ action('DefaultController@language', ['lang' => 'en']) }}"><img src="{{ URL::to('/') }}/css/images/UNKG0001.GIF"></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ URL::to('/') }}">{{ trans('messages.login') }}</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>