<footer class="page-footer pt-10 ">

    <div class="container-fluid pb-10">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="page-footer__social pull-right">
                        <ul class="social social--simple">
                            <li>
                                <a href="{{ theme_option('facebook') }}" title="Facebook" class="hi-icon fa fa-facebook"></a>
                            </li>
                            <li>
                                <a href="{{ theme_option('youtube') }}" title="Youtube" class="hi-icon fa fa-youtube"></a>
                            </li>
                        </ul>
                    </div>
            </div>
            <div class="col-lg-12" >
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 " >
                    <div class="logo-foot" style="overflow: hidden;">
                         <img src="{{ get_image_url(theme_option('logo')) }}">
                    </div>
                   
                    
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 info-foot" >
                    <div class="info-foot">
                        <h4 class="info-text">LIÊN HỆ</h4>
                        <h5 class="info-text">Ban truyền thông Giáo Phận Hà Tĩnh</h5>
                        <h5 class="info-text">{{ theme_option('address') }}</h5>
                        <h5 class="info-text">{{ theme_option('numberphone') }} | {{ theme_option('telephone') }}</h5>
                        <h5 class="info-text">{{ theme_option('contact_email') }}</h5>
                    </div>
                </div>
            </div>
        </div>
            

            
    </div>
    <div class="page-footer__bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="page-copyright">
                        <p>{!! clean(theme_option('copyright')) !!}</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</footer>
<div id="back2top"><i class="fa fa-angle-up"></i></div>
</div>

<!-- JS Library-->
{!! Theme::footer() !!}

@if (session()->has('success_msg'))
    <script type="text/javascript">
        swal('{{ __('Success') }}', "{{ session('success_msg', '') }}", 'success');
    </script>
@endif

@if (session()->has('error_msg'))
    <script type="text/javascript">
        swal('{{ __('Success') }}', "{{ session('error_msg', '') }}", 'error');
    </script>
@endif

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0&appId={{ setting('facebook_app_id', config('plugins.facebook.general.app_id')) }}&autoLogAppEvents=1"></script>

<div class="fb-customerchat"
     attribution=setup_tool
     page_id="157007981299897"
     theme_color="#0084ff">
 </div>
</body>
</html>
