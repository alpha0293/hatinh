<?php 
$post_tag = get_posts_by_relative_tag($data->name);
$diff_parish_in_deanery = getListParishNotThis($data->id, $data->deanery_id);
$galery_par = array_slice(render_gallery_giaoxu($data), 0, 10);
$galery_par_count = count(render_gallery_giaoxu($data));
?>
<style type="text/css">
.owl-theme .owl-controls.clickable{
    display: none !important;
}   
</style>  
<section class="section pt-50 pb-100">
    <div class="container-fluid">
        <div class="row">
            <section class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <div class="page-content">
                    <article class="post post--single">
                        <header class="post__header text-center">
                            <h3 class="post__title">{{$data->name}}</h3>
                            <div class="post__meta">
                                @if ($data->address!=null)
                                <span class="post-category"><i class="glyphicon glyphicon-screenshot"></i>
                                    <a href="{{ Request::url() }}/#bando" >{{$data->address }}</a>
                                </span>
                                @endif
                                <span class="post__created-at"><a href="#">Ngày cập nhật: {{ date_from_database($data->updated_at, 'M d, Y') }}</a></span>
                            </div>
                            <div class="post__social"></div>
                        </header>
                        <div class="post__content">
                            <div class="post-thumb mt-50 par_thumb">
                                <img src="{{ get_object_image($data->image, 'medium') }}">
                            </div>
                            @if(!$data->history->isEmpty())
                            <div class="lich-su mt-50">
                                <h4 class="clearfix vi-header wow fadeInUpBig " data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#"> Quá trình hình thành và phát triển</a></h4>
                                @foreach($data->history as $history)
                                <a href="{{$history->url}}">{!!$history->content!!}</a>
                                @endforeach 
                            </div>
                            @else
                            <div class="lich-su mt-50">
                                <p>Lịch sử giáo xứ đang được cập nhật!</p>
                            </div>
                            @endif
                            @if(!$data->lmtungquan==null)
                            <div class="parish-info mt-50" >
                                <h4 class="clearfix vi-header wow fadeInUpBig " data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#"> Các linh mục tiền nhiệm</a></h4>
                                {!! $data->lmtungquan!!}
                            </div>
                            @endif
                            @if(!$data->lmqquehuong==null)
                            <div class="parish-info mt-50" >
                                <h4 class="clearfix vi-header wow fadeInUpBig " data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#">Các linh mục quê hương</a></h4>
                                {!! $data->lmqquehuong!!}
                            </div>
                            @endif
                            @if(!$data->tusiquehuong==null)
                            <div class="parish-info mt-50" >
                             <h4 class="clearfix vi-header wow fadeInUpBig " data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#"> Các tu sĩ quê hương</a></h4>
                             {!! $data->tusiquehuong!!}
                         </div>
                         @endif
                         @if(!$data->chungsinh==null)
                         <div class="parish-info mt-50" >
                            <h4 class="clearfix vi-header wow fadeInUpBig " data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#"> Các chủng sinh quê hương</a></h4>
                            {!! $data->chungsinh!!}
                        </div>
                        @endif
                        <fieldset  class="mt-50" id="bando">
                         <h4 class="clearfix vi-header wow fadeInUpBig " data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#"> Địa chỉ trên bản đồ</a></h4>
                         <div class="content-of-title">
                          <?php 
                          $content = '[google-map]Giáo xứ '.$data->name.' ,'.$data->address.'[/google-map]';
                          echo($content);?>
                          {!! do_shortcode('') !!}
                      </div>
                  </fieldset>
                  @if (defined('GALLERY_MODULE_SCREEN_NAME') && !empty($galleries = gallery_meta_data($data)))
                  <div class="mt-50">
                    <h4 class="clearfix vi-header wow fadeInUpBig " data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#"> Một số hình ảnh của giáo xứ</a></h4>
                        <a class="btn btn-default" href="{{ route('imgparish', $slug->key) }}">Xem tất cả {{$galery_par_count}} hình ảnh <i class="glyphicon glyphicon-plus"></i></a>
                    <div id="list-photo">
                        @foreach ($galery_par as $image)
                        @if ($image)
                        <div class="item" data-src="{{ get_object_image($image['img'], 'img') }}" data-sub-html="">
                            <div class="photo-item">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{ get_object_image($image['img'], 'img') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>

                        @endif
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <footer class="post__footer ml-15">
                <div class="row">
                    <div class="mt-50">
                     <div class="fb-like" style="display: flex;" data-href="{{ Request::url() }}" data-layout="button_count" data-send="true" data-action="like" data-show-faces="true" data-share="true"></div>
                 </div> 
             </div>
         </footer>   
     </article>
 </div>
</section>
<section class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
    <div class="page-sidebar">
        <div class="widget widget__recent-post">
            <div class="widget__header">
                <h3 class="widget__title">Thông tin</h3>
            </div>
            <div class="widget__content">
                <ul class="list ">
                    <li>
                        <article class="post post__widget clearfix">
                            <header class="post__header">
                                <h5 class="post__title">Cha quản xứ: {{$data->lmquanxu}}</h5>
                            </header>
                        </article>
                    </li>
                    @if(!$data->lmphutrach==null)
                    <li>
                        <article class="post post__widget clearfix">
                            <header class="post__header">
                                <h5 class="post__title">Cha phụ trách: {{$data->lmphutrach}}</h5>
                            </header>
                        </article>
                    </li>
                    @endif
                    @if(!$data->lmpho==null)
                    <li>
                        <article class="post post__widget clearfix">
                            <header class="post__header">
                                <h5 class="post__title">Cha phó: {{$data->lmpho}}</h5>
                            </header>
                        </article>
                    </li>
                    @endif
                    <li>
                        <article class="post post__widget clearfix">
                            <header class="post__header">
                                <h5 class="post__title">Số giáo dân: {{$data->totalmember}}</h5>
                            </header>
                        </article>
                    </li>
                    <li>
                        <article class="post post__widget clearfix">
                            <header class="post__header">
                                <h5 class="post__title">Số giáo họ: {{$data->totalGiaoho}}</h5>
                            </header>
                        </article>
                    </li>
                    <li>
                        <article class="post post__widget clearfix">
                            <header class="post__header">
                                <h5 class="post__title">Thuộc giáo hạt: {{$data->deanery->name}}</h5>
                            </header>
                        </article>
                    </li>
                </ul>
            </div>
        </div>
        <div class="widget widget__recent-post">
            <div class="widget__header">
                <h3 class="widget__title">Giờ lễ</h3>
            </div>
            <div class="widget__content">
                <ul class="list ">
                    @if(has_field($data,'gio_le'))
                    @foreach(get_field($data,'gio_le')[0] as $giole)
                    @if($giole['slug'] == 'ngay_thuong')
                    <li>
                        <article class="post post__widget clearfix">
                            <header class="post__header">
                                <h5 class="post__title">Ngày thường: {{$giole['value']}}</h5>
                            </header>
                        </article>
                    </li>
                    @elseif($giole['slug'] == 'chua_nhat')
                    <li>
                        <article class="post post__widget clearfix">
                            <header class="post__header">
                                <h5 class="post__title">Chúa nhật:: {{$giole['value']}}</h5>
                            </header>
                        </article>
                    </li>
                    @endif
                    @endforeach
                    @else
                    <li>
                        <article class="post post__widget clearfix">
                            <header class="post__header">
                                <h5 class="post__title">Giờ lễ của giáo xứ chưa được cập nhật</h5>
                            </header>
                        </article>
                    </li>
                    @endif

                </ul>
            </div>
        </div>
        @if(!($post_tag->first()==null))
        <div class="widget widget__recent-post">
            <div class="widget__header">
                <h3 class="widget__title">Bài viết liên quan giáo xứ</h3>
            </div>
            <div class="widget__content">
                <ul class="list list--fadeIn">
                    @foreach($post_tag as $post)
                    @if ($loop->first)
                    <article class="post post__vertical post__vertical--single post__vertical--simple">
                        <div class="post__thumbnail">
                            <img src="{{ get_object_image($post->image, 'medium') }}" alt="{{ $post->name }}"><a href="{{ $post->url }}" class="post__overlay"></a>
                        </div>
                        <div class="post__content-wrap">
                            <header class="post__header">
                                <h3 class="post__title"><a href="{{ $post->url }}">{{ $post->name }}</a></h3>
                            </header>
                        </div>
                    </article>
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
        @endif
        @if(!($diff_parish_in_deanery->first()==null))
        <div class="widget widget__recent-post">
            <div class="widget__header">
                <h3 class="widget__title">Các xứ khác trong hạt</h3>
            </div>
            <div class="widget__content">
                <ul class="list ">

                    @foreach($diff_parish_in_deanery as $par)
                    <li>
                        <article class="post post__widget clearfix">
                            <div class="post__thumbnail"><img src="{{ get_object_image($par->image, 'medium') }}" alt="{{ $par->name }}">
                                <a href="{{ $par->url }}" class="post__overlay"></a></div>
                                <header class="post__header">
                                    <h5 class="post__title"><a href="{{ $par->url }}" data-number-line="2">{{ $par->name }}</a></h5>
                                    <p>{{ $par->address }}</p>
                                </header>
                            </article>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
    </div>
</section>
</div>
</div>
</section>