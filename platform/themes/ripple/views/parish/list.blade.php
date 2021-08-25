<?php 
$member = 0;
foreach($data as $pr){
	$member+=$pr->totalmember;
}
 ?>
<article class="post post--single">
    <header class="post__header text-center">
        <h3 class="post__title">DANH SÁCH CÁC GIÁO XỨ TRONG GIÁO PHẬN</h3>
        <div class="post__meta">
        	<h4>Có {{$data->count()}} Giáo xứ trong {{$deanery->count()}} Giáo hạt</h4>
        	<h4>Số giáo dân: {{$member}}</h4>
        	Cập nhật ngày:    {{ date_from_database($data->first()->updated_at, 'd - m - Y') }}
        </div>
        <div class="post__social"></div>
    </header>

    
    <div class="post__content">
       <table id="contact-detail" class="responsive display table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr class="head-table">
			<th>Tên</th>
			<th data-priority="1">Quản xứ</th>
			<th>Phụ trách</th>
			<th>Cha phó</th>
			<th data-priority="2">Địa chỉ</th>
			<th>Phone</th>
			<th >Giáo hạt</th>
			<th>Giáo dân</th>
			<th>Giáo họ</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach($data as $pr)
		<tr>
			<td>{{$pr->name}}</td>
			<td>{{$pr->lmquanxu}}</td>
			<td>{{$pr->lmphutrach}}</td>
			<td>{{$pr->lmpho}}</td>
			<td>{{$pr->address}}</td>
			<td>{{$pr->phonenumber}}</td>
			<td>{{$pr->deanery->name}}</td>
			<td>{{$pr->totalmember}}</td>
			<td>{{$pr->totalGiaoho}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
 
    </div>

<footer class="post__footer">
    <div class="row">

    </div>
</footer>   
</article>
