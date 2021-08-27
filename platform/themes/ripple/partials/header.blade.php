<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" lang="{{ app()->getLocale() }}"><![endif]-->
    <!--[if IE 8]><html class="ie ie8" lang="{{ app()->getLocale() }}"><![endif]-->
        <!--[if IE 9]><html class="ie ie9" lang="{{ app()->getLocale() }}"><![endif]-->
            <html lang="{{ app()->getLocale() }}">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="format-detection" content="telephone=yes">
                <meta name="apple-mobile-web-app-capable" content="yes">
                {!! Theme::header() !!}
                <!-- Fonts-->
                <link href="https://fonts.googleapis.com/css?family={{ theme_option('primary_font', 'Roboto') }}" rel="stylesheet" type="text/css">
                <!-- CSS Library-->
                
                <style>
                body {font-family: '{{ theme_option('primary_font', 'Roboto') }}', sans-serif !important;}
            </style>

            
            <div id="fb-root"></div>
            
            
            </head>
            <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
                <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
                    <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
                        <body>
                            
                        <div class="headers">
                            <div class="divlogo">
                                <img class="logo" src="{{ get_image_url(theme_option('logo')) }}" alt="GP Hà Tĩnh" >
                            </div>
                        <div class="header-top">

                            <!-- ngon ngu -->

                            <div class="lang-login">
                                <!-- SEARCH-->
                                <div id="search-wrapper" class="pull-left active-search">
                                    <form class="quick-search" action="{{route('public.search') }}">
                                        <input type="text" id="search" name="q" placeholder="{{ __('Type to search...') }}" class=" search-input" autocomplete="off">
                                        <div id="close-icon"></div>
                                    </form>
                                </div>
                                <div class="language-wrapper">
                                    {!! apply_filters('language_switcher') !!}
                                </div>
                            </div> 
                            
                        </div>
                            
                        <header data-sticky="false" data-sticky-checkpoint="200" data-responsive="991" class="page-header">
                            <div class="container-fluid menu-head">
                               
                                 <div class="social-net pull-right">
                                    <a class="facebook" href="{{ theme_option('facebook') }}"> FACEBOOK |</a>
                                    <a class="youtube" href="{{ theme_option('youtube') }}">YOUTUBE</a>
                                </div>
                                <!-- mobile -->
                                <div class="navigation-toggle navigation-toggle--dark"><span></span>
                                </div>
                                

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
                                <span class="close-search" style="font-size: 40px;">&times;</span>
                                <div class="search-result"></div>
                            </div>
                            @endif
                        </header>
                    </div>
                   
                    <div id="page-wrap">

