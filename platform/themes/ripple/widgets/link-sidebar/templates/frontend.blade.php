<div class="aside-box">
    <div class="aside-custom">
        <div class="aside-img">
           <a href="{{$config['url']}}" style="background-image: url({{ get_image_url($config['image'])?? get_image_url(setting('media_default_placeholder_image'))}});" title="{{($config['name'])}}">
            </a> 
        </div>
        @if($config['display']=='co')
        <div class="aside-title">
            <h3 class="entry-title">
                <a href="{{$config['url']}}" title="{{($config['name'])}}">{{ __($config['name']) }}</a>
            </h3>
        </div>
         @endif
    </div>
</div>
