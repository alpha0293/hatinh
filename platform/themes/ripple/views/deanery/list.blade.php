<style type="text/css">
.owl-theme .owl-controls.clickable{
  display: none !important;
}
</style>
<article class="post post--single">
    <header class="post__header text-center">
        <h3 class="post__title">Danh sách Giáo hạt trong Giáo Phận</h3>
        <div class="post__meta">
            <h5 class="">Có {{$data->count()}} Giáo hạt</h5>
        </div>
        <div class="post__social"></div>
    </header>
    <div class="post__content">
       <div id="cards_landscape_wrap-2">
    <div class="row">
        @if(!empty($data->all()))
        @foreach($data->all() as $deanery)
        <?php 
        $totalmem = 0;
        foreach ($deanery->parishes as $par){
            $totalmem += $par->totalmember;
        }
        ?>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
            <a href="{{$deanery->url}}">
                <div class="card-flyer">
                    <div class="text-box">
                        <div class="image-box">
                            <img src="{{ get_object_image($deanery->image) }}" alt="" />
                        </div>
                        <div class="text-container">
                            <h6>{{$deanery->name}}</h6>
                            <p>Quản hạt: {{$deanery->lmquanhat}}</p>
                            <p>Sở hạt: {{$deanery->sohat}}</p>
                            <p>Số giáo xứ: {{$deanery->parishes->count()}}</p>
                            <p>Địa chỉ: {{$deanery->address}}</p>
                            <p>Số giáo dân: {{$totalmem}}</p>
                        </div>
                        <div class="post-meta">
                                    <p><a href="#" class="post-author">Cập nhật ngày: </a> <a href="#" class="post-date">{{ date_from_database($deanery->created_at, 'd - m - Y') }}</a></p>
                                </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @endif
    </div>
</div>
 
    </div>
<footer class="post__footer">
    <div class="row">

    </div>
</footer>   
</article>








