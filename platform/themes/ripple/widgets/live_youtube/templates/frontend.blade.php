@if($config['turn']==='co')
<div class="aside-box live-box">
    <div class="header-live">
        <marquee><span style="background: red; border-radius: 15px; color: #ffff; border: 1px solid #ffff; padding: 0 3px; font-size: 13px">live</span> {{$config['name']}}</marquee>
    </div>
    <div class="embed-responsive embed-responsive-16by9 mb30">
    @if($config['channel']==='co')
       <iframe src="https://www.youtube.com/embed/live_stream?channel=UCor5-e3c4xQMkZN4iKjjrbg" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
   @else
     @if($config['embed-different']!='Nhập mã nhúng')
      {!!$config['embed-different']!!}
     @else
      <h4 style="text-align: center;">Lỗi trình phát video. Vui lòng đợi trong giây lát, ban quản trị sẽ chèn lại mã nhúng. Xin lỗi vì sự bất tiện này.</h4>
     @endif
   @endif 
    </div>
</div>
@endif