<table>
	@foreach($data->all() as $deanery)
		<h1>{{$deanery->name}}</h1>
		<h1>{{$deanery->address}}</h1>
		<h1>{{$deanery->lmphutrach}}</h1>
		<h1>{{$deanery->name}}</h1>
		<h1>{{$deanery->name}}</h1>
	@endforeach
</table>