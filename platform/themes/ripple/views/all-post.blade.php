@php
        $featured = get_featured_posts(6);
        $featuredList = [];
        if (!empty($featured)) {
            $featuredList = $featured->pluck('id')->all();
        }
        $index=0;
    @endphp
@if (!empty($featured))
<div class="col-12">
    <div id="example5" class="slider-pro">
        <div class="sp-slides">
            @foreach ($featured as $post)
            
                <div class="sp-slide">
                    <img class="sp-image"
                    data-src="{{ get_object_image($post->image) }}"
                    data-retina="{{ get_object_image($post->image) }}"/>

                    <a href="{{ route('public.single', $post->slug) }}">
                        <div class="sp-caption">{{ $post->name }}</div>
                    </a>
                </div>
            
            @endforeach
        </div>
        <div class="sp-thumbnails">
            @foreach ($featured as $post)
            <a href="{{ route('public.single', $post->slug) }}">
                <div class="sp-thumbnail">
                    <div class="sp-thumbnail-image-container">
                        <img class="sp-thumbnail-image" src="{{ get_object_image($post->image) }}"/>
                    </div>
                    <div class="sp-thumbnail-text">
                        <div class="sp-thumbnail-description">{{ $post->name }}</div>
                    </div>
                </div>   
            </a>
            
            @endforeach
        </div>
    </div>
</div>
@endif
@if ($posts->count() > 0)
<?php 
 $category1 = get_posts_by_category(theme_option('category1'));
 $category2 = get_posts_by_category(theme_option('category2'));
 $category3 = get_posts_by_category(theme_option('category3'));
 if (!empty($category1->first())) {
     $not1 = $category1->first()->categories->first()->id;
 }else $not1='';
 if (!empty($category2->first())) {
     $not2 = $category2->first()->categories->first()->id;
 }else $not2='';
 if (!empty($category3->first())) {
     $not3 = $category3->first()->categories->first()->id;
 }else $not3='';
 $category4 = get_posts_not_category([$not1,$not2,$not3]);
 ?>
    <!-- ============= Post Content Area Start ============= -->
    <!-- Catagory Area -->
    @if(!empty($category1->first()))
    <div class="col-12 mt-50">
        <div class="row">
           <h4 class="clearfix vi-header wow fadeInUpBig ml-15 mr-15" data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#"> {{ $category1->first()->categories->first()->name }}</a></h4>
           @foreach($category1 as $post)
           @if ($loop->first)
            <div class="col-12 col-md-6">
                <div class="wow fadeInUpBig" data-wow-delay="0.1s">
                    <!-- Single Blog Post -->
                    <div class="single-blog-post">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="{{get_object_image($post->image, 'medium')}}" alt="">
                            <!-- Catagory -->
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="{{ $post->url }}" class="headline">
                                <h5>{{$post->name}}</h5>
                            </a>
                            <p>{{$post->description}}</p>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p> <a href="#" class="post-date">{{ date_from_database($post->created_at, 'M d, Y') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                @else
                <!-- Single Blog Post -->
                <div class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                    <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 singpost">
                     <!-- Post Thumbnail -->
                     <div class="post-thumbnail">
                        <img src="{{get_object_image($post->image, 'medium')}}" alt="">
                    </div> 
                </div>
                <div class="col-xs-9 col-sm-9 col-lg-9 col-md-9 ">
                    <!-- Post Content -->
                    <div class="post-content">
                        <a href="#" class="headline">
                            <h5>{{$post->name}}</h5>
                        </a>
                    </div>
                </div> 
            </div>
            @endif
            @if ($loop->last)
        </div>
        @endif
        @endforeach
    </div>
</div>
    @endif
@if(!empty($category2->first())||!empty($category3->first()))
<div class="col-12">
    <!-- Catagory Area -->
    <div class="world-catagory-area mt-50">
        <div class="tab-content">
            <div class="row">
                @if(!empty($category2->first()))
                @foreach($category2 as $post)
                 @if ($loop->first)
                <div class="col-12 col-md-6">
                    <h4 class="clearfix vi-header wow fadeInUpBig" data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#"> {{ $post->categories->first()->name }}</a></h4>
                    <!-- Single Blog Post -->
                    <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <a href="{{ $post->url }}">
                                <img src="{{get_object_image($post->image, 'medium')}}" alt="">
                            </a>
                            
                            <!-- Catagory -->
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="{{ $post->url }}" class="headline">
                                <h5>{{$post->name}}</h5>
                            </a>
                            <p>{{$post->description}}</p>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p> <a href="" class="post-date">{{ date_from_database($post->created_at, 'M d, Y') }}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix wow fadeInUpBig" data-wow-delay="0.4s">
                        @else
                <!-- Single Blog Post -->
                        <div class="single-blog-post post-style-2 d-flex align-items-center">
                            <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 singpost">
                             <!-- Post Thumbnail -->
                             <div class="post-thumbnail">
                                
                                    <img src="{{get_object_image($post->image, 'medium')}}" alt="">
                             
                                
                            </div> 
                        </div>
                        <div class="col-xs-9 col-sm-9 col-lg-9 col-md-9 ">
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="{{ $post->url }}" class="headline">
                                    <h5>{{$post->name}}</h5>
                                </a>
                            </div>
                        </div> 
                    </div>
                     @endif
                     @if ($loop->last)
                    </div>


</div>
@endif
@endforeach
@endif
 @if(!empty($category3->first()))
                @foreach($category3 as $post)
                 @if ($loop->first)
                <div class="col-12 col-md-6">
                    <h4 class="clearfix vi-header wow fadeInUpBig" data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#"> {{ $post->categories->first()->name }}</a></h4>
                    <!-- Single Blog Post -->
                    <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <a href="{{ $post->url }}">
                                <img src="{{get_object_image($post->image, 'medium')}}" alt="">
                            </a>
                            
                            <!-- Catagory -->
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="{{ $post->url }}" class="headline">
                                <h5>{{$post->name}}</h5>
                            </a>
                            <p>{{$post->description}}</p>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p> <a href="" class="post-date">{{ date_from_database($post->created_at, 'M d, Y') }}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix wow fadeInUpBig" data-wow-delay="0.4s">
                        @else
                <!-- Single Blog Post -->
                        <div class="single-blog-post post-style-2 d-flex align-items-center">
                            <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 singpost">
                             <!-- Post Thumbnail -->
                             <div class="post-thumbnail">
                                
                                    <img src="{{get_object_image($post->image, 'medium')}}" alt="">
                             
                                
                            </div> 
                        </div>
                        <div class="col-xs-9 col-sm-9 col-lg-9 col-md-9 ">
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="{{ $post->url }}" class="headline">
                                    <h5>{{$post->name}}</h5>
                                </a>
                            </div>
                        </div> 
                    </div>
                     @endif
                     @if ($loop->last)
                    </div>


</div>
@endif
@endforeach
@endif

</div>


</div>
</div>
</div>
@endif
@if(!empty($category4->first()))
<div class="col-12 mt-50">
    <div class="row justify-content-center">
            <h4 class="clearfix vi-header wow fadeInUpBig ml-15 mr-15" data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#">Các bài tin khác</a></h4>
                <!-- ========== Single Blog Post ========== -->
                @foreach($category4 as $post)
                <div class="col-12 col-md-6">
                    <div class="single-blog-post post-style-3 mt-10 wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="{{get_object_image($post->image, 'featured')}}" alt="">
                            <!-- Post Content -->
                            <div class="post-content d-flex align-items-center justify-content-between">
                                <!-- Catagory -->
                                <div class="post-tag"><a href="#">{{ $post->categories->first()->name }}</a></div>
                                <!-- Headline -->
                                <a href="{{ $post->url }}" class="headline">
                                    <h5>{{ $post->name }}</h5>
                                </a>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p><a href="#" class="post-date">{{ date_from_database($post->created_at, 'M d, Y') }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="page-pagination text-right">
        {!! $category4->links() !!}
    </div>
</div>
</div>
@endif
@else
    <div class="alert alert-warning">
        <p>{{ __('There is no data to display!') }}</p>
    </div>
@endif