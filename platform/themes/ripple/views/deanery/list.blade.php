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
      
<div class="cards">
        @if(!empty($data->all()))
        @foreach($data->all() as $deanery)
        <?php 
        $totalmem = 0;
        foreach ($deanery->parishes as $par){
            $totalmem += $par->totalmember;
        }
        ?>
        <a href="{{$deanery->url}}" class="card">
            <div class="card-image">
             <img src="{{ get_object_image($deanery->image) }}" alt="" /> 
         </div>

         <div class="card-content">
          <div class="card-top">
            <h6 class="card-title">{{$deanery->name}}</h6>
            <p>Quản hạt: {{$deanery->lmquanhat}}</p>
            <p>Sở hạt: {{$deanery->sohat}}</p>
            <p>Số giáo xứ: {{$deanery->parishes->count()}}</p>
            <p>Địa chỉ: {{$deanery->address}}</p>
            <p>Số giáo dân: {{$totalmem}}</p>
        </div>
        <div class="card-bottom">
            <div class="card-watching">Cập nhật ngày: {{ date_from_database($deanery->created_at, 'd - m - Y') }}</div>
        </div>
    </div>
</a>
        @endforeach
        @endif
    </div>
 
    </div>
<footer class="post__footer">
    <div class="row">

    </div>
</footer>   
</article>


