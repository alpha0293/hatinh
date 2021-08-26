@php Theme::set('section-name', $post->name) @endphp

<article class="post post--single">
    <header class="post__header">
        <h3 class="post__title">{{ $post->name }}</h3>
        <div class="post__meta">
            @if (!$post->categories->isEmpty())
                <span class="post-category"><i class="ion-cube"></i>
                    <a href="{{ $post->categories->first()->url }}">{{ $post->categories->first()->name }}</a>
                </span>
            @endif
            
            <span class="post__created-at"><i class="ion-clock"></i><a href="#">{{ date_from_database($post->created_at, 'M d, Y') }}</a></span>
            <span class="post__created-at"><i class="glyphicon glyphicon-eye-open"><a href="#" style="margin-left: 10px;">{{$post->views}}</a></i></span>
            @if ($post->user->username)
                <span class="post__author"><i class="ion-android-person"></i><span>{{ $post->user->getFullName() }}</span></span>
            @endif

            @if (!$post->tags->isEmpty())
                <span class="post__tags"><i class="ion-pricetags"></i>
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('public.tag', $tag->slug) }}">{{ $tag->name }}</a>
                    @endforeach
                </span>
            @endif
        </div>
        <div class="post__social"></div>
    </header>
    <div class="post__content">
        
        {!! $post->content !!}
        <div class="fb-like" style="display: flex;" data-href="{{ Request::url() }}" data-layout="button_count" data-send="true" data-action="like" data-show-faces="true" data-share="true"></div>
    </div>
    <footer class="post__footer">
        <div class="row">
            @foreach (get_related_posts($post->id, 2) as $related_item)
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="post__relate-group @if ($loop->last) post__relate-group--right @endif">
                        <h4 class="relate__title">@if ($loop->first) {{ __('Previous Post') }} @else {{ __('Next Post') }} @endif</h4>
                        <article class="post post--related">
                            <div class="post__thumbnail"><a href="{{ $related_item->url }}" class="post__overlay"></a>
                                <img src="{{ get_object_image($related_item->image, 'thumb') }}" alt="{{ $related_item->name }}">
                            </div>
                            <header class="post__header"><a href="{{ $related_item->url }}" class="post__title"> {{ $related_item->name }}</a></header>
                        </article>
                    </div>
                </div>
            @endforeach
        </div>
    </footer> 
    <?php 
    $cate = [];
    foreach ($post->categories as $category) {
        array_push($cate, $category->id);
    }
    $samePost = getSamePosts($cate, $post->id, $paginate = 6, $limit = 6)
 ?>
<div class="mt-50 mb-10">
    <h4 class="clearfix vi-header "><a class="vi-left-title pull-left" href="#"> Bài viết liên quan</a></h4>
<div class="cards">
      <div class="card">
        <img
          src="https://images.unsplash.com/reserve/HgZuGu3gSD6db21T3lxm_San%20Zenone.jpg?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          alt=""
          class="card-image"
        />
        <div class="card-content">
          <div class="card-top">
            <h3 class="card-title">2020 World Champs Gaming Warzone</h3>
            
          </div>
          <div class="card-bottom">
            <div class="card-live">
              <ion-icon name="wifi"></ion-icon>
              <span>Live</span>
            </div>
            <div class="card-watching">4.2k watching</div>
          </div>
        </div>
      </div>
      <div class="card">
        <img
          src="https://images.unsplash.com/reserve/HgZuGu3gSD6db21T3lxm_San%20Zenone.jpg?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          alt=""
          class="card-image"
        />
        <div class="card-content">
          <div class="card-top">
            <h3 class="card-title">2020 World Champs Gaming Warzone</h3>
            
          </div>
          <div class="card-bottom">
            <div class="card-live">
              <ion-icon name="wifi"></ion-icon>
              <span>Live</span>
            </div>
            <div class="card-watching">4.2k watching</div>
          </div>
        </div>
      </div>
     
    </div>
</div>  
</article>

