
<div class="col-12">
    <div class="world-catagory-slider owl-carousel wow fadeInUpBig" data-wow-delay="0.1s">
       @foreach($recent_post as $recent)
       <!-- Single Blog Post -->
       <div class="single-blog-post">
        <!-- Post Thumbnail -->
        <div class="post-thumbnail" style="background-image: url({{ get_object_image($recent->image, 'medium') }}); background-size: cover; height: 250px;">
           
            <!-- Catagory -->
            <div class="post-cta"><a href="#">{{ $recent->categories->first()->name }}</a></div>
        </div>
        <!-- Post Content -->
        <div class="post-content">
            <a href="#" class="headline">
                <h5>{{$recent->name}}</h5>
            </a>
        </div>
    </div>
    @endforeach

</div>
</div>
<div class="col-12 mt-50">
    <!-- ============= Post Content Area Start ============= -->
    <!-- Catagory Area -->

    <div class="tab-content" id="myTabContent">
        <div class="row">
           <h4 class="clearfix vi-header wow fadeInUpBig" data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#"> Tin Giáo Phận</a></h4>
            <div class="col-12 col-md-6">
                <div class="world-catagory-slider owl-carousel wow fadeInUpBig" data-wow-delay="0.1s">
                    <!-- Single Blog Post -->
                    <div class="single-blog-post">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="{{ Theme::asset()->url('images/vanhanh.jpg') }}" alt="">
                            <!-- Catagory -->
                            <div class="post-cta"><a href="#">travel</a></div>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="#" class="headline">
                                <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                            </a>
                            <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Blog Post -->
                    <div class="single-blog-post">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="img/blog-img/b2.jpg" alt="">
                            <!-- Catagory -->
                            <div class="post-cta"><a href="#">travel</a></div>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="#" class="headline">
                                <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                            </a>
                            <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Blog Post -->
                    <div class="single-blog-post">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="img/blog-img/b3.jpg" alt="">
                            <!-- Catagory -->
                            <div class="post-cta"><a href="#">travel</a></div>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="#" class="headline">
                                <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                            </a>
                            <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <!-- Single Blog Post -->
                <div class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                    <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 singpost">
                     <!-- Post Thumbnail -->
                     <div class="post-thumbnail">
                        <img src="{{ Theme::asset()->url('images/vanhanh.jpg') }}" alt="">
                    </div> 
                </div>
                <div class="col-xs-9 col-sm-9 col-lg-9 col-md-9 ">
                    <!-- Post Content -->
                    <div class="post-content">
                        <a href="#" class="headline">
                            <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                        </a>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-12">
    <!-- Catagory Area -->
    <div class="world-catagory-area mt-50">
        <div class="tab-content">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h4 class="clearfix vi-header wow fadeInUpBig" data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#">Giáo hội hoàn vũ</a></h4>
                    <!-- Single Blog Post -->
                    <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="{{ Theme::asset()->url('images/vanhanh.jpg') }}" alt="">
                            <!-- Catagory -->
                            <div class="post-cta"><a href="#">travel</a></div>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="#" class="headline">
                                <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                            </a>
                            <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        @for($i=1;$i<=4;$i++)
                        @if($i%2!=0)
                        <div class="world-catagory-slider2 owl-carousel wow fadeInUpBig" data-wow-delay="0.4s">
                            <!-- ========= Single Catagory Slide ========= -->
                            <div class="single-cata-slide">
                                <div class="row">
                                    <div class="">
                                        <!-- Single Blog Post -->
                                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                                            <!-- Post Thumbnail -->
                                            <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3">
                                             <div class="post-thumbnail">
                                                <img src="{{ Theme::asset()->url('images/vanhanh.jpg') }}" alt="">
                                            </div> 
                                        </div>
                                        <!-- Post Content -->
                                        <div class="col-xs-9 col-sm-9 col-lg-9 col-md-9">
                                            <div class="post-content">
                                                {{$i}}
                                                <a href="#" class="headline">
                                                    <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                                                </a>
                                                <!-- Post Meta -->
                                                <div class="post-meta">
                                                    <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ========= Single Catagory Slide ========= -->
                        <div class="single-cata-slide">
                            <div class="row">
                                <div class="">
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                                        <!-- Post Thumbnail -->
                                        <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 singpost">
                                         <div class="post-thumbnail">
                                            <img src="{{ Theme::asset()->url('images/vanhanh.jpg') }}" alt="">
                                        </div> 
                                    </div>
                                    <!-- Post Content -->
                                    <div class="col-xs-9 col-sm-9 col-lg-9 col-md-9">
                                        <div class="post-content">
                                            {{$i+1}}
                                            uuu
                                            <a href="#" class="headline">
                                                <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                                            </a>
                                            <!-- Post Meta -->
                                            <div class="post-meta">
                                                <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endfor

    </div>


</div>

<div class="col-12 col-md-6">
    <h4 class="clearfix vi-header wow fadeInUpBig" data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#">Giáo hội Việt Nam</a></h4>
    <!-- Single Blog Post -->
    <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.3s">
        
        <!-- Post Thumbnail -->
        <div class="post-thumbnail">
            <img src="img/blog-img/b3.jpg" alt="">
            <!-- Catagory -->
            <div class="post-cta"><a href="#">travel</a></div>
        </div>
        <!-- Post Content -->
        <div class="post-content">
            <a href="#" class="headline">
                <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
            </a>
            <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
            <!-- Post Meta -->
            <div class="post-meta">
                <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
            </div>
        </div>
    </div>
    <div class="slide">
                        @for($i=1;$i<=4;$i++)
                        @if($i%2!=0)
                        <div class="world-catagory-slider2 owl-carousel wow fadeInUpBig" data-wow-delay="0.4s">
                            <!-- ========= Single Catagory Slide ========= -->
                            <div class="single-cata-slide">
                                <div class="row">
                                    <div class="">
                                        <!-- Single Blog Post -->
                                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                                            <!-- Post Thumbnail -->
                                            <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3">
                                             <div class="post-thumbnail">
                                                <img src="{{ Theme::asset()->url('images/vanhanh.jpg') }}" alt="">
                                            </div> 
                                        </div>
                                        <!-- Post Content -->
                                        <div class="col-xs-9 col-sm-9 col-lg-9 col-md-9">
                                            <div class="post-content">
                                                {{$i}}
                                                <a href="#" class="headline">
                                                    <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                                                </a>
                                                <!-- Post Meta -->
                                                <div class="post-meta">
                                                    <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ========= Single Catagory Slide ========= -->
                        <div class="single-cata-slide">
                            <div class="row">
                                <div class="">
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                                        <!-- Post Thumbnail -->
                                        <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 singpost">
                                         <div class="post-thumbnail">
                                            <img src="{{ Theme::asset()->url('images/vanhanh.jpg') }}" alt="">
                                        </div> 
                                    </div>
                                    <!-- Post Content -->
                                    <div class="col-xs-9 col-sm-9 col-lg-9 col-md-9">
                                        <div class="post-content">
                                            {{$i+1}}
                                            uuu
                                            <a href="#" class="headline">
                                                <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                                            </a>
                                            <!-- Post Meta -->
                                            <div class="post-meta">
                                                <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endfor

    </div>
</div>

</div>


</div>
</div>
</div>
<div class="col-12 mt-50">
    <div class="row justify-content-center">
        <div class="row">
            <h4 class="clearfix vi-header wow fadeInUpBig" data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#">Tin tổng hợp</a></h4>
                <!-- ========== Single Blog Post ========== -->
                @for($i=0;$i<6;$i++)
                <div class="col-12 col-md-6">
                    <div class="single-blog-post post-style-3 mt-10 wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="{{ Theme::asset()->url('images/vanhanh.jpg') }}" alt="">
                            <!-- Post Content -->
                            <div class="post-content d-flex align-items-center justify-content-between">
                                <!-- Catagory -->
                                <div class="post-tag"><a href="#">travel</a></div>
                                <!-- Headline -->
                                <a href="#" class="headline">
                                    <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                                </a>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
    </div>
</div>