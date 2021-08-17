@if (is_plugin_active('blog'))
    @php
        $featured = get_featured_posts(8);
        $featuredList = [];
        if (!empty($featured)) {
            $featuredList = $featured->pluck('id')->all();
        }
        $index=0;
    @endphp
    
    @if (!empty($featured))
         <section id="dich-vu" class="jarallax module icon-service-module clearfix" style=" background-color:#ddf3e8;"> 
    <div class="container-fluid"> 
            <div class="module-caption col-md-12 text-center"> 
                <h1 style="color: #181a1c;">NỔI BẬT <span>GIÁO PHẬN HÀ TĨNH</span></h1> 
                <div class="separator"> 
                    <span><i class="fa fa-circle"></i></span> 
                </div>  
            </div>
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="row noibat-home">
               @foreach($featured as $feat)
               <div class="col-md-3 col-lg-3 col-sm-4">
                <div class="feat-col">
                    <a href="{{ $feat->url }}">
                        <div class="post-thumbnail">
                            <img src="{{ get_object_image($feat->image, 'medium') }}" alt="">
                        </div>
                        
                        <div class="content-nb">
                            <h4 ">Thư cảm ơn của Đức cha Loius Nguyễn Anh Tuấn về việc đóng góp cứu trợ các nạn nhân Covid tại Sài Gòn.</h4>
                        </div>
                    </a>
                    <div class="foot">
                        <span class="glyphicon glyphicon-time"> {{date_format($feat->updated_at,"d/m/Y")}}</span>
                        <span class="glyphicon glyphicon-eye-open"> {{$feat->views}}</span>
                        <a href="{{ $feat->url }}">Xem thêm...</a>
                    </div>
                </div>
                    
               </div>
               @endforeach
            </div>
            </div>
            
           
    </div>
  <div class="triangle" style="display: none;"></div>

</section>

    @endif
@endif
