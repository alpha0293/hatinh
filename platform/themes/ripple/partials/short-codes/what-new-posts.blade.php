<section class="section bg-parallax bg-img background-overlay" style="background-image: url({{ Theme::asset()->url('images/vanhanh.jpg') }});">


                    <div class="hero-area" style="height: 530px;">

    <!-- Hero Slides Area -->

    <!-- <div class="hero-slides owl-carousel">
        <div class="single-hero-slide bg-img background-overlay" style="background-image: url({{ Theme::asset()->url('images/vanhanh.jpg') }});"></div>
        <div class="single-hero-slide bg-img background-overlay" style="background-image: url({{ Theme::asset()->url('images/vanhanh2.jpg') }});"></div>
    </div> -->

    <!-- Hero Post Slide -->
    <div class="hero-post-area">
        <div class="container-fluid">
            <!-- row -->
            <div class="">
                <div class="col-12">
                    <div class="hero-post-slide">
                        <?php $i=1 ?>
                        @foreach (get_latest_posts(5,[]) as $post)

                        <!-- Single Slide -->
                        <div class="single-slide d-flex align-items-center">
                            <div class="post-number">
                                <p>{{$i++}}</p>
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

</section>
