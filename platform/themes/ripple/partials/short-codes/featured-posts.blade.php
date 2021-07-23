@if (is_plugin_active('blog'))
    @php
        $featured = get_featured_posts(6);
        $featuredList = [];
        if (!empty($featured)) {
            $featuredList = $featured->pluck('id')->all();
        }
    @endphp

    @if (!empty($featured))
         <section id="dich-vu" class="module icon-service-module clearfix"> 
    <div class="container tu"> 
        <div class="row"> 
            <div class="module-caption col-md-12 text-center"> 
                <h1 style="color: #181a1c;">NỔI BẬT <span>GIÁO PHẬN HÀ TĨNH</span></h1> 
                <div class="separator"> 
                    <span><i class="fa fa-circle"></i></span> 
                </div> <div class="spacer"></div> 
            </div> 
            @foreach ($featured as $featureItem)
            <!-- cột -->
            <div class="icon-service-box col-md-4 text-center"> 
                <a href="{{ $featureItem->url }}"> 
                    <div class="service-icon"> 
                        <img src="{{ get_object_image($featureItem->image, 'medium') }}" alt="{{ $featureItem->name }}">
                    </div> 
                    <h3 class="service-title"><span>{{ $featureItem->name }}</span></h3> 
                    <p class="service-content">{{Str::substr(html_entity_decode(strip_tags($featureItem->content)),0,275)}}...</p> 
                </a> <br> 
                <div class="promo-btn"> 
                    <a class="btn btn-info" href="{{ $featureItem->url }}">Chi tiết</a>
                </div> 
                <div class="spacer">
                </div> 
            </div> 
            <!-- hết cột -->
            @endforeach
           
        </div> 
    </div>
 
</section>
<div class="triangle" ></div>

    @endif
@endif
