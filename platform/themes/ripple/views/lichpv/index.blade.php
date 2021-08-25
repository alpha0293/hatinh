
<article class="post post--single">
    <header class="post__header text-center">
        <h3 class="post__title">LỊCH PHỤNG VỤ GIÁO PHẬN</h3>
         @if($data->first()!=null)
        <div class="post__meta">
            
            <h4 class="mb-10"><i class="glyphicon glyphicon-screenshot"></i> 
                @if($data->first()->name == 'can-biet-truoc')
                Những điều cần biết trước
                @else
                Tháng {{ $data->first()->name }} 
                @endif
                <i class="glyphicon glyphicon-screenshot"></i>
            </h4>
            @for($i=1;$i<=12;$i++)
            @if($i != intval($data->first()->name))
            <span class="post-category">
                <a class="label label-primary" style="color: #ffff" href="{{ route('getLichPV_slug', $i) }}" >{{$i}}</a>
            </span>
            @endif
            @endfor
            @if($data->first()->name != 'can-biet-truoc')
            <p class="post-category mt-15">
                <a class="label label-success" href="{{ route('getLichPV_slug', 'can-biet-truoc') }}" >Những điều cần biết trước</a>
            </p>
            @endif
            
        </div>
        <div class="post__social"></div>
    </header>


    <div class="post__content">

      {!! $data->first()->content !!}

  </div>
   @else
      <h4>Chưa có lịch cho tháng này</h4>
      <h5>Vui lòng chọn lịch phụng vụ tháng khác hoặc trở về trang chủ</h5>
      @for($i=1;$i<=12;$i++)
            <span class="post-category pr-10">
                <a class="label label-primary" href="{{ route('getLichPV_slug', $i) }}" >{{$i}}</a>
            </span>
      @endfor
       <p class="post-category mt-15">
                <a href="{{ route('getLichPV_slug', 'can-biet-truoc') }}" >Những điều cần biết trước</a>
            </p>
        
        <h5><a class="label label-primary" href="{{route('public.index')}}">Quay lại Trang chủ</a></h5>
    @endif
  <footer class="post__footer">
    <div class="row">
    </div>
</footer>   
</article>













