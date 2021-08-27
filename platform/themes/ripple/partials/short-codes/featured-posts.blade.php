@if (is_plugin_active('blog'))
@php
$featured = get_featured_posts(6);
$featuredList = [];
if (!empty($featured)) {
    $featuredList = $featured->pluck('id')->all();
}
$index=0;
@endphp

@if (!empty($featured))
<section id="dich-vu" class="jarallax module icon-service-module clearfix" > 
    <div class="container-fluid"> 
        <div class="module-caption col-md-12 text-center"> 
            <h1 style="color: #181a1c;">NỔI BẬT <span>GIÁO PHẬN HÀ TĨNH</span></h1> 
            <div class="separator"> 
                <span><i class="fa fa-circle"></i></span> 
            </div>  
        </div>
        <div class="noibat-home">
            <div class="home-cards">
             @foreach($featured as $feat)


             <a href="{{$feat->url}}" class="home-card">
                <div class="home-card-image">
                 <img src="{{ get_object_image($feat->image) }}" alt="" /> 
             </div>

             <div class="home-card-content">
                <div class="home-card-top">
                    <h6 class="home-card-title">{{$feat->name}}</h6>
            </div>
            <div class="home-card-bottom">
                <div class="home-card-watching">{{$feat->views}} lượt xem</div>
            </div>
        </div>
    </a>

    @endforeach
</div>
</div>


</div>
<div class="triangle" style="display: none;"></div>

</section>

@endif
@endif
