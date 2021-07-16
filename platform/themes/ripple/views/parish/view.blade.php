<h1>Tên giáo xứ: {{$data->name}}</h1>
<h1>Địa chỉ: {{$data->address}}</h1>
<h1>Số giáo dân: {{$data->totalmember}}</h1>
<h1>Số giáo họ: {{$data->totalGiaoho}}</h1>
<h1>Thuộc giáo hạt: {{$data->deanery->name}}</h1>
<h1>Bài viết lịch sử giáo xứ:</h1>
@foreach($data->history as $history)
	<a href="{{$history->url}}">{{$history->name}}</a>
@endforeach