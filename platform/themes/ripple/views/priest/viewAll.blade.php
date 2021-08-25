<article class="post post--single">
    <header class="post__header text-center">
        <h3 class="post__title">DANH SÁCH LINH MỤC ĐOÀN GIÁO PHẬN</h3>
        <div class="post__meta">
        	Cập nhật ngày:    {{ date_from_database($data->first()->updated_at, 'd - m - Y') }}
        </div>
        <div class="post__social"></div>
    </header>

    
    <div class="post__content">
       <table id="contact-detail" class="responsive display table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Họ tên</th>
			<th>Năm sinh</th>
			<th>Năm LM</th>
			<th>Quê quán</th>
			<th data-priority="1">Nơi phục vụ</th>
			<th data-priority="2">Phone</th>
			<th>Email</th>
			<th>Hình ảnh</th>
			<th>Ghi chú</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach($data as $lm)
		<tr>
			<td>{{$lm->name}}</td>
			<td>{{$lm->dob}}</td>
			<td>{{$lm->dopriest}}</td>
			<td>Chưa có data</td>
			<td>{{$lm->address}}</td>
			<td>{{$lm->phonenumber}}</td>
			<td>{{$lm->email}}</td>
			<td>{{$lm->image}}</td>
			<td>{{$lm->note}}</td>
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
