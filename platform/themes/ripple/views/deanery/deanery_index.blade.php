<?php 
$post_tag = get_posts_by_relative_tag($data->name);
$diff_deanery = getListDeaneryNotThis($data->id);
$totlemem = 0;
$totleparish=0;
foreach ($data->parishes as $parish) {
	$totlemem += $parish->totalmember;
	$totleparish+=1;
} 	
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
							<div class="post-thumb mt-50">
								<img src="{{ get_object_image($data->image, 'medium') }}">
							</div>
							@if(!empty($data->content))
							<div class="lich-su mt-50">
							<h4 class="clearfix vi-header wow fadeInUpBig " data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#"> Quá trình hình thành và phát triển</a></h4>
								{!!$data->content!!}
							</div>
							@else
							<div class="lich-su mt-50">
								<p>Lịch sử giáo hạt đang được cập nhật!</p>
							</div>
							@endif
						<div class="mt-50">
							
							@if(!empty($post_tag))
							<h4 class="clearfix vi-header wow fadeInUpBig " data-wow-delay="0.2s"><a class="vi-left-title pull-left" href="#"> Bài viết về Giáo hạt</a></h4>
		                		@foreach($post_tag as $post)
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
		                        @endforeach
		                    @endif
						</div>
							<div class="mt-50">
								<div class="fb-like" style="display: flex;" data-href="{{ Request::url() }}" data-layout="button_count" data-send="true" data-action="like" data-show-faces="true" data-share="true"></div>
							</div>
						</div>

						<footer class="post__footer">
							<div class="row">

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
                        					<h5 class="post__title">Cha quản hạt: {{$data->lmquanhat}}</h5>
                        				</header>
                        			</article>
                        		</li>
                        		<li>
                        			<article class="post post__widget clearfix">
                        				<header class="post__header">
                        					<h5 class="post__title">Sở hạt: {{$data->sohat}}</h5>
                        				</header>
                        			</article>
                        		</li>
                        		<li>
                        			<article class="post post__widget clearfix">
                        				<header class="post__header">
                        					<h5 class="post__title">Số lượng giáo xứ: {{$totleparish}}</h5>
                        				</header>
                        			</article>
                        		</li>
                        		<li>
                        			<article class="post post__widget clearfix">
                        				<header class="post__header">
                        					<h5 class="post__title">Số giáo dân: {{$totlemem}}</h5>
                        				</header>
                        			</article>
                        		</li>
                        	</ul>
                        </div>
                    </div>
                    @if(!($data->parishes->first()==null))
					<div class="widget widget__recent-post">
                        <div class="widget__header">
                            <h3 class="widget__title">Danh sách giáo xứ</h3>
                        </div>
                        <div class="widget__content">
                            <ul class="list ">
                                @foreach($data->parishes as $parish)
                                            <li>
                                                <article class="post post__widget clearfix">
                                                <div class="post__thumbnail"><img src="{{ get_object_image($parish->image, 'medium') }}" alt="{{ $parish->name }}">
                                                    <a href="{{ $parish->url }}" class="post__overlay"></a></div>
                                                <header class="post__header">
                                                    <h5 class="post__title"><a href="{{ $parish->url }}" data-number-line="2">{{$parish->name}}</a></h5>
                                                    <p>{{ $parish->address }}</p>
                                                </header>
                                            </article>
                                            </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                  	@if(!($diff_deanery->first()==null))
                    <div class="widget widget__recent-post">
                        <div class="widget__header">
                            <h3 class="widget__title">Các Giáo hạt khác</h3>
                        </div>
                        <div class="widget__content">
                            <ul class="list ">
                           
                                @foreach($diff_deanery as $deanery)
                                            <li>
                                                <article class="post post__widget clearfix">
                                                <div class="post__thumbnail"><img src="{{ get_object_image($deanery->image, 'medium') }}" alt="{{ $deanery->name }}">
                                                    <a href="{{ $deanery->url }}" class="post__overlay"></a></div>
                                                <header class="post__header">
                                                    <h5 class="post__title"><a href="{{ $deanery->url }}" data-number-line="2">{{ $deanery->name }}</a></h5>
                                                    <p>{{ $deanery->address }}</p>
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
<!-- -------------------------- -->

