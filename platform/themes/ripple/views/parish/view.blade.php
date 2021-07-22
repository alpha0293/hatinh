<h1>Tên giáo xứ: {{$data->name}}</h1>
<h1>Địa chỉ: {{$data->address}}</h1>
<h1>Số giáo dân: {{$data->totalmember}}</h1>
<h1>Số giáo họ: {{$data->totalGiaoho}}</h1>
<h1>Thuộc giáo hạt: {{$data->deanery->name}}</h1>

<h1>Giờ lễ</h1>
@if(has_field($data,'gio_le'))
	@foreach(get_field($data,'gio_le')[0] as $giole)
		@if($giole['slug'] == 'ngay_thuong')
		<h2>Ngày thường: {{$giole['value']}}</h2>
		@elseif($giole['slug'] == 'chua_nhat')
		<h2>Chúa nhật: {{$giole['value']}}</h2>
		@endif
	@endforeach
@else
<h2>Chưa có thông tin về giờ lễ của giáo xứ này!!!</h2>
@endif
<h2>Địa chỉ trên bản đồ</h2>
<?php 
$content = '[google-map]Giáo xứ '.$data->name.' ,'.$data->address.'[/google-map]';
echo($content);?>
{!! do_shortcode('') !!}
<h1>Bài viết lịch sử giáo xứ:</h1>
@foreach($data->history as $history)
	<a href="{{$history->url}}">{{$history->name}}</a>
@endforeach