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
            <span class="post-category"><i class="glyphicon glyphicon-screenshot"></i>
                <a href="{{ Request::url() }}/#bando" >{{$data->address }}</a>
            </span>
            @endif
            @if ($data->phonenumber!=null)
            <span class="post-category"><i class="glyphicon glyphicon-earphone"></i>
                <a >{{$data->phonenumber }}</a>
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
        <fieldset  class="mt-50">
            <legend>Giờ lễ</legend>
            <div class="content-of-title">
              @if(has_field($data,'gio_le'))
              @foreach(get_field($data,'gio_le')[0] as $giole)
              @if($giole['slug'] == 'ngay_thuong')
              <p>Ngày thường:</span><span> {{$giole['value']}}</span> </p>
              @elseif($giole['slug'] == 'chua_nhat')
              <p>Chúa nhật: <span> {{$giole['value']}}</span></p>
              @endif
              @endforeach
              @else
              <p>Chưa có thông tin về giờ lễ của giáo xứ này!!!</p>
              @endif
          </div>
      </fieldset>
      <div class="parish-info mt-50" style="background-color: #cbf7e2;border: 2px solid blanchedalmond;">
       <p>Cha quản xứ: {{$data->lmquanxu}}</p>
       @if(!$data->lmphutrach==null)
       <p>Cha phụ trách: {{$data->lmphutrach}}</p>
       @endif
       @if(!$data->lmpho==null)
       <p>Cha phó: {{$data->lmpho}}</p>
       @endif
       <p>Số giáo dân: {{$data->totalmember}}</p>
       <p>Số giáo họ: {{$data->totalGiaoho}}</p>
       <p>Thuộc giáo hạt: {{$data->deanery->name}}</p>
   </div>
   @if(!$data->lmtungquan==null)
   <div class="parish-info mt-50" >
    <p>Các linh mục tiền nhiệm:
    </p>
    {!! $data->lmtungquan!!}
</div>
@endif
@if(!$data->lmqquehuong==null)
<div class="parish-info mt-50" >
    <p>Các linh mục quê hương:</p>
    {!! $data->lmqquehuong!!}
</div>
@endif
@if(!$data->tusiquehuong==null)
<div class="parish-info mt-50" >
    <p>Các tu sĩ quê hương:</p>
    {!! $data->tusiquehuong!!}
</div>
@endif
@if(!$data->chungsinh==null)
<div class="parish-info mt-50" >
    <p>Các chủng sinh quê hương:</p>
    {!! $data->chungsinh!!}
</div>
@endif
<fieldset  class="mt-50" id="bando">
    <legend>Địa chỉ trên bản đồ</legend>
    <div class="content-of-title">
      <?php 
      $content = '[google-map]Giáo xứ '.$data->name.' ,'.$data->address.'[/google-map]';
      echo($content);?>
      {!! do_shortcode('') !!}
  </div>
</fieldset>
@if(!$data->history->isEmpty())
<div class="lich-su mt-50">
   <p>Quá trình hình thành và phát triển:</p>

   @foreach($data->history as $history)
   <a href="{{$history->url}}">{!!$history->content!!}</a>
   @endforeach 
</div>
@else
<div class="lich-su mt-50">
    <p>Lịch sử giáo xứ đang được cập nhật!</p>
</div>
@endif
@if (defined('GALLERY_MODULE_SCREEN_NAME') && !empty($galleries = gallery_meta_data($data)))
<div class="mt-50">
    <p>Một số hình ảnh của Giáo xứ:</p>
    {!! render_gallery_giaoxu($galleries) !!}
</div>

@endif

</div>

<footer class="post__footer">
    <div class="row">

    </div>
</footer>   
</article>
