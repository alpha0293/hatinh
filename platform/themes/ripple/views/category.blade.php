<?php 
$post_cate = getFeaturedOfCategory($category->id);
 ?>
@php Theme::set('section-name', $category->name) @endphp
<article class="post post--single">
    <header class="post__header text-center mb-10">
       <h3 class="post__title">Danh mục {{$category->name}}</h3>
   </header>
   <div class="post__content">
    @if ($posts->count() > 0)
    <div class="mt-50 mb-10 list-post">
        <div class="cards">
            @if(!empty($post_cate))
            @foreach($post_cate as $post)
            <a href="{{$post->url}}" class="card">
                <div class="card-image">
                 <img src="{{ get_object_image($post->image) }}" alt="" /> 
             </div>

             <div class="card-content">
              <div class="card-top">
                <h3 class="card-title">{{$post->id}}{{$post->name}}</h3>
            </div>
            <div class="card-bottom">
                <div class="card-watching">{{$post->views}} lượt xem</div>
            </div>
        </div>
    </a>
    @endforeach
    @endif
</div>
</div> 
    @foreach ($posts as $post)
    <article class="post post__horizontal mb-40 clearfix">
       <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
        <!-- Post Thumbnail -->
        <div class="post-thumbnail">
            <img src="{{ get_object_image($post->image) }}" alt="">
        </div>
        <!-- Post Content -->
        <div class="post-content">
            <a href="#" class="headline">
                <h5>{{$post->name}}</h5>
            </a>
            <p>{{$post->description}}</p>
            <!-- Post Meta -->
            <div class="post-meta">
                <p><a href="#" class="post-author">Cập nhật ngày: </a> <a href="#" class="post-date">{{ date_from_database($post->created_at, 'd - m - Y') }}</a></p>
            </div>
        </div>
    </div>
</article>
@endforeach
<div class="page-pagination text-right">
    {!! $posts->links() !!}
</div>

@endif
</div>
</article>
