@if (is_plugin_active('blog'))
    @php
        $featured = get_featured_posts(6);
        $featuredList = [];
        if (!empty($featured)) {
            $featuredList = $featured->pluck('id')->all();
        }
        $index=0;
    @endphp
    
    @if (!empty($featured))
         <section id="dich-vu" class="jarallax module icon-service-module clearfix" > 
    <div class="container-fluid"> 
            <div class="module-caption col-md-12 text-center"> 
                <h1 style="color: #181a1c;">NỔI BẬT <span>GIÁO PHẬN HÀ TĨNH</span></h1> 
                <div class="separator"> 
                    <span><i class="fa fa-circle"></i></span> 
                </div>  
            </div>
                <div class="row noibat-home">
               @foreach($featured as $feat)
               <div class="col-md-4 col-lg-4 col-sm-4 col-nb">

                <div class="feat-col">
                    <a href="{{ $feat->url }}">
                        <img class="feat-thumb" src="{{ get_object_image($feat->image, 'medium') }}" alt="">
                        
                        <div class="content-nb">
                            <h4 >{{$feat->name}}</h4>
                        </div>
                    </a>
                   
                </div>
                    
               </div>
               @endforeach
            </div>
            
           
    </div>
  <div class="triangle" style="display: none;"></div>

</section>

    @endif
@endif
