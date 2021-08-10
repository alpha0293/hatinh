<style type="text/css">
	.owl-theme .owl-controls.clickable{
		display: none !important;
	}
</style>
<article class="post post--single">
    <header class="post__header">
        <h3 class="post__title">{{$data->name}}</h3>
        <div class="post__meta">
       
            @if ($data->address!=null)
                <span class="post-category"><i class="ion-cube"></i>
                    <a >{{$data->address }}</a>
                </span>
            @endif
            
            <span class="post__created-at"><a href="#">Ngày cập nhật: {{ date_from_database($data->updated_at, 'M d, Y') }}</a></span>
         
        </div>
        <div class="post__social"></div>
    </header>
    @if (defined('GALLERY_MODULE_SCREEN_NAME') && !empty($galleries = gallery_meta_data($data)))
  {!! render_object_gallery($galleries) !!}
@endif
    <div class="post__content">
        <div class="parish-info" style="background-color: #cbf7e2;border: 2px solid blanchedalmond;">
        	<p>Số giáo dân: {{$data->totalmember}}</p>
        	<p>Số giáo họ: {{$data->totalGiaoho}}</p>
        	<p>Thuộc giáo hạt: {{$data->deanery->name}}</p>
        </div>
        <fieldset>
    <legend>Giờ lễ</legend>
    <div class="content-of-title">
        		@if(has_field($data,'gio_le'))
        		@foreach(get_field($data,'gio_le')[0] as $giole)
        		@if($giole['slug'] == 'ngay_thuong')
        		<p>Ngày thường:</p><p> {{$giole['value']}}</p>
        		@elseif($giole['slug'] == 'chua_nhat')
        		<p>Chúa nhật:</p><p> {{$giole['value']}}</p>
        		@endif
        		@endforeach
        		@else
        		<p>Chưa có thông tin về giờ lễ của giáo xứ này!!!</p>
        		@endif
        	</div>
  </fieldset>
        <span>Địa chỉ trên bản đồ</span>
        	<?php 
        	$content = '[google-map]Giáo xứ '.$data->name.' ,'.$data->address.'[/google-map]';
        	echo($content);?>
        	{!! do_shortcode('') !!}
        	<p>Bài viết lịch sử giáo xứ:</p>
        	@foreach($data->history as $history)
        	<a href="{{$history->url}}">{{$history->name}}</a>
        	@endforeach
        <div class="fb-like" style="display: flex;" data-href="{{ Request::url() }}" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
    </div>
    <footer class="post__footer">
        <div class="row">
           
        </div>
    </footer>   
</article>
