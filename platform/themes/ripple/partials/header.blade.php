<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" lang="{{ app()->getLocale() }}"><![endif]-->
    <!--[if IE 8]><html class="ie ie8" lang="{{ app()->getLocale() }}"><![endif]-->
        <!--[if IE 9]><html class="ie ie9" lang="{{ app()->getLocale() }}"><![endif]-->
            <html lang="{{ app()->getLocale() }}">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="format-detection" content="telephone=no">
                <meta name="apple-mobile-web-app-capable" content="yes">

                <!-- Fonts-->
                <link href="https://fonts.googleapis.com/css?family={{ theme_option('primary_font', 'Roboto') }}" rel="stylesheet" type="text/css">
                <!-- CSS Library-->
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
                <style>
                body {font-family: '{{ theme_option('primary_font', 'Roboto') }}', sans-serif !important;}
            </style>

            {!! Theme::header() !!}
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=281789615495762&autoLogAppEvents=1" nonce="z0T0LfkG"></script>
            <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
            <!--WARNING: Respond.js doesn't work if you view the page via file://-->
        <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
            </head>
            <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
                <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
                    <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
                        <body>
                            <div class="headers">
                                <div class="mxh">
                                    <i class="glyphicon glyphicon-chevron-right ttw-share-activate-button"></i>
                                    <div class="mxh-content">
                                      <ul class="social-share-wrapper social-share-wrapper-active social-share-wrapper-shadow">
                                        <li>
                                           <a href="{{ theme_option('facebook') }}" title="Facebook" class=""> <img src="{{ Theme::asset()->url('images/fb.ico') }}" alt="Facebook"></a> 
                                       </li>
                                    <li>
                                        <a href="{{ theme_option('youtube') }}" title="Youtube" class=""><img src="{{ Theme::asset()->url('images/yt.ico') }}" alt="Youtube"></a>
                                    </li>
                                </ul>  
                            </div>
                        </div>
                        <div class="header-top" style="height: 30px; background-color: #29412f ;">
                            <!-- ngon ngu -->
                                  <div class="lang-login">
                                    @if (is_plugin_active('member'))
                                    <ul class="pull-left">
                                        @if (Auth::guard('member')->check())
                                        <li><a href="{{ route('public.member.dashboard') }}" rel="nofollow"><i class="fa fa-user"></i> <span>{{ Auth::guard('member')->user()->getFullName() }}</span></a></li>
                                        <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" rel="nofollow"><i class="fa fa-sign-out"></i> {{ __('Logout') }}</a></li>
                                        @else
                                        <li><a href="{{ route('public.member.login') }}" rel="nofollow"><i class="fa fa-sign-in"></i> {{ __('Login') }}</a></li>
                                        @endif
                                    </ul>
                                    @auth('member')
                                    <form id="logout-form" action="{{ route('public.member.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @endauth
                                    @endif
                                    <div class="language-wrapper">
                                        {!! apply_filters('language_switcher') !!}
                                    </div>
                                </div>  
                                <!-- het ngon ngu -->
                        </div>
                        <div class="banner" style="height: 120px; background-image: url({{ Theme::asset()->url('images/header.png') }}); background-size: cover;">
                            <div class="container-fluid">
                                <img class="logo" style="max-width: 86px;" src="{{ get_image_url(theme_option('logo')) }}" alt="" height="80">
                                <div class="giammuc">
                                    <img src="{{ Theme::asset()->url('images/duccha.png') }}">
                                </div>
                            </div>
                        </div>
                        <header data-sticky="false" data-sticky-checkpoint="200" data-responsive="991" class="page-header page-header--light">
                            <div class="container-fluid">
                                <!-- LOGO-->
                                <!-- mobile -->
                                <div class="navigation-toggle navigation-toggle--dark"><span></span>
                                    </div>
                                <!-- SEARCH-->
                                <div class="pull-right search-btn c-search-toggler"><i class="fa fa-search close-search"></i></div>

                                <!-- menu -->
                                        <!-- NAVIGATION-->
                                        <nav class="navigation navigation--light navigation--fade navigation--fadeLeft">
                                            {!!
                                            Menu::renderMenuLocation('main-menu', [
                                            'options' => ['class' => 'menu sub-menu--slideLeft'],
                                            'view'    => 'main-menu',
                                            ])
                                            !!}
                                        </nav>
                                <!-- het menu -->

                                <div class="clearfix"></div>  
                    </div>
                    @if (is_plugin_active('blog'))
                    <div class="super-search hide">
                        <form class="quick-search" action="{{ route('public.search') }}">
                            <input type="text" name="q" placeholder="{{ __('Type to search...') }}" class="form-control search-input" autocomplete="off">
                            <span class="close-search">&times;</span>
                        </form>
                        <div class="search-result"></div>
                    </div>
                    @endif
                </header>
            </div>
            <div id="page-wrap">

