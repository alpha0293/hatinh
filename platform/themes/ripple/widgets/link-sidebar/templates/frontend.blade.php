<div class="aside-box">
    <div class="aside-box-header">
        @if($config['display']=='co')
        <h4>{{ __($config['name']) }}</h4>
        @endif
    </div>
    <a href="{{$config['url']}}"><img class="img-sidebar" src="{{ get_image_url($config['image'])?? get_image_url(setting('media_default_placeholder_image'))}}" alt=""></a>
</div>
