<?php 
    if(!is_numeric($config['limit'])){ 
        $config['limit'] = 6;}
    elseif($config['limit']<0){
        $config['limit'] = 6;
    }
    $posts = get_posts_by_category($config['category'],$config['limit']);
?>
@if (is_plugin_active('blog') && $posts->first() != null)
    @if ($sidebar == 'footer_sidebar' )
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="widget widget--transparent widget__footer">
                @else
                    <div class="widget widget__recent-post">
                        @endif
                        <div class="widget__header">
                            <h3 class="widget__title">@if($config['name']=='Thongbao')Thông báo @else {{$config['name']}} @endif</h3>
                        </div>
                        <div class="widget__content">
                            <ul class="list  @if($sidebar == 'footer_sidebar') list--light @endif list--fadeIn">
                                @foreach ($posts as $post)
                                    
                                        @if ($sidebar == 'footer_sidebar')
                                        <li>
                                            <a href="{{ $post->url }}" data-number-line="2">{{ $post->name }}</a>
                                        </li>
                                        @else
                                            
                                            <li>
                                                <article class="post post__widget clearfix">
                                                    <a href="{{ $post->url }}" data-number-line="2">{{ $post->name }}</a>
                                                </article>
                                            </li>
                                        @endif
                                    
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @if ($sidebar == 'footer_sidebar')
            </div>
        </div>
    @endif
@endif
