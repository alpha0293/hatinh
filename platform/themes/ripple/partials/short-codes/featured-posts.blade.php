@if (is_plugin_active('blog'))
    @php
        $featured = get_featured_posts(8);
        $featuredList = [];
        if (!empty($featured)) {
            $featuredList = $featured->pluck('id')->all();
        }
        $index=0;
    @endphp
    
    @if (!empty($featured))
         <section id="dich-vu" class="module icon-service-module clearfix"> 
    <div class="container tu"> 
        <div class="row"> 
            <div class="module-caption col-md-12 text-center"> 
                <h1 style="color: #181a1c;">NỔI BẬT <span>GIÁO PHẬN HÀ TĨNH</span></h1> 
                <div class="separator"> 
                    <span><i class="fa fa-circle"></i></span> 
                </div>  
            </div>
            @if($featured -> count()>3)
            <div class="row justify-content-center">
                @for($i=0;$i<3;$i++)
                <!-- ========== Single Blog Post ========== -->
                <div class="col-md-4">
                    <div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img class="img-p" src="{{ get_object_image($featured[$i]->image, 'medium') }}" alt="">
                            <!-- Post Content -->
                            <div class="post-content d-flex align-items-center justify-content-between">
                                <!-- Catagory -->
                                <div class="post-tag"><a href="#">{{ $featured[$i]->categories->first()->name }}</a></div>
                                <!-- Headline -->
                                    <h5>{{ $featured[$i]->name }}</h5>
                                </a>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p> <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <div class="hero-post-slide">
                @for ($i=3;$i<$featured -> count();$i++)
                <!-- Single Slide -->
                <div class="single-slide d-flex align-items-center">
                    <div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img class="img-p" src="{{ get_object_image($featured[$i]->image, 'medium') }}" alt="">
                            <!-- Post Content -->
                            <div class="post-content d-flex align-items-center justify-content-between">
                                <!-- Catagory -->
                                <div class="post-tag"><a href="#">{{ $featured[$i]->categories->first()->name }}</a></div>
                                <!-- Headline -->
                                    <h5>{{ $featured[$i]->name }}</h5>
                                </a>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p> <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
                @endfor
            </div>
            @else
            @foreach($featured as $feat)
                <!-- ========== Single Blog Post ========== -->
                <div class="col-md-4">
                    <div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img class="img-p" src="{{ get_object_image($feat->image, 'medium') }}" alt="">
                            <!-- Post Content -->
                            <div class="post-content d-flex align-items-center justify-content-between">
                                <!-- Catagory -->
                                <div class="post-tag"><a href="#">{{ $feat->categories->first()->name }}</a></div>
                                <!-- Headline -->
                                    <h5>{{ $feat->name }}</h5>
                                </a>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p> <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            
            
           
        </div> 
    </div>
 
</section>

    @endif
@endif
