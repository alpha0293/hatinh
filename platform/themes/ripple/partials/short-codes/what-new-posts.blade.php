<!-- ********** Hero Area Start ********** -->
<section class="hero-area" style="top: 42px;">

    <!-- Hero Slides Area -->
    <div class="hero-slides owl-carousel">

        @foreach (get_latest_posts(5,[]) as $post)
        <!-- Single Slide -->
        <div class="single-hero-slide bg-img background-overlay" style="background-image: url({{ get_object_image($post->image, 'medium') }});"></div>
        @endforeach
    </div>

    <!-- Hero Post Slide -->
    <div class="hero-post-area">
        <div class="container">
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
</section>
<!-- ********** Hero Area End ********** -->
