<table>
	@foreach($data->all() as $deanery)
		<h1> Tên hạt: {{$deanery->name}}</h1>
		<h1>Địa chỉ: {{$deanery->address}}</h1>
		<h1>LM phụ trách: {{$deanery->lmquanhat}}</h1>
		<h1>Các giáo xứ:</h1>
			@foreach($deanery->parishes as $parish)
				<h2>Tên giáo xứ: {{$parish->name}}</h2>
				<a href="{{$parish->url}}">{{$parish->name}}</a>
				<h2>Giáo hạt: {{$parish->deaneries}}</h2>
			@endforeach
		<h2>Het 1 hat</h2>
	@endforeach
</table>