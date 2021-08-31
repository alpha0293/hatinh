<?php 
$tg = gallery_home_slide();
 ?>

<section class="section slider-home "  >
    @if(get_latest_posts(5)->count()!=0)
       <div class="hero-area">

    <!-- Hero Slides Area -->

    <!-- <div class="hero-slides">
      
        <img class="single-hero-slide " src="{{ Theme::asset()->url('images/Back1.jpg') }}">
        <img class="single-hero-slide " src="{{ Theme::asset()->url('images/Back2.jpg') }}">
  
    </div>  -->
    <!-- Hero Post Slide -->
  
    
    <div class="hero-post-area">
        <div class="container-fluid">
            <!-- row -->
            <div class="">
                <div class="home_slider">
                    @if(!empty($tg))
                   <ul class="home_slider__list">

                    @foreach($tg as $lg)
                      <li class="home_slider__slide"><img  class="img-home-slider" src="{{ get_object_image($lg['img']) }}" alt="Slide image number 1 with plane" /></li>
                      @endforeach
                  </ul>
                  @endif

              </div>
                <div class="col-12">
                    <div class="hero-post-slide">
                        @foreach (get_latest_posts(5,[]) as $post)

                        <!-- Single Slide -->
                        <div class="single-slide d-flex align-items-center">
                            <div class="post-number">
                                <img src="{{ Theme::asset()->url('images/small_lg.png') }}">
                            </div>
                            <div class="post-title">
                                <a href="{{ route('public.single', $post->slug) }}">{{ $post->name }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<h3 style="color: #ffff; text-align: center; margin-top: 20px;">Chưa có dữ liệu để hiển thị - chúng tôi sẽ trở lại</h3>
@endif

</section>