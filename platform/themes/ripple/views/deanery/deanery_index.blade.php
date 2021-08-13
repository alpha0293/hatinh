<?php 
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
						<header class="post__header">
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
							
							<div class="mt-50">
								<div class="fb-like" style="display: flex;" data-href="{{ Request::url() }}" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
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
                    <div class="widget widget__recent-post">
                        <div class="widget__header">
                            <h3 class="widget__title">Bài viết về giáo hạt</h3>
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
                    <div class="widget widget__recent-post">
                        <div class="widget__header">
                            <h3 class="widget__title">Các Giáo hạt khác</h3>
                        </div>
                        <div class="widget__content">
                            <ul class="list ">
                                @foreach($data->all() as $deanery)
                                            <li>
                                                <article class="post post__widget clearfix">
                                                <div class="post__thumbnail"><img src="{{ get_object_image($deanery->image, 'medium') }}" alt="{{ $deanery->name }}">
                                                    <a href="{{ $deanery->url }}" class="post__overlay"></a></div>
                                                <header class="post__header">
                                                    <h5 class="post__title"><a href="{{ $deanery->url }}" data-number-line="2">{{$deanery->name}}</a></h5>
                                                    <p>{{ $deanery->address }}</p>
                                                </header>
                                            </article>
                                            </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
				</div>
			</section>
		</div>
	</div>
</section>
<!-- -------------------------- -->

