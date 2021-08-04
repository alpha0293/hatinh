@extends('core/base::layouts.master')
@section('content')
    <div id="dashboard-alerts">
        
    </div>
    {!! apply_filters(DASHBOARD_FILTER_ADMIN_NOTIFICATIONS, null) !!}
    <div class="row">
        {!! apply_filters(DASHBOARD_FILTER_TOP_BLOCKS, null) !!}
    </div>
    <div class="clearfix"></div>
    <div id="list_widgets" class="row">
    	<h1 class="relate__title">Thống kê giáo phận</h1>
    	<h1>Số Giáo hạt: {{$deanery->count()}}</h1>
    	<h2>Số Linh mục: {{$priest->count()}}</h2>
    	<h2>Số giáo xứ/Chuẩn xứ: {{$parish->count()}}</h2>
    	<h2>Số giáo dân: {{$parish->sum('totalmember')}}</h2>
    	<h2>Số giáo họ: {{$parish->sum('totalGiaoho')}}</h2>
        <h2>Giáo xứ đông giáo dân nhất: {{$parish->max('totalmember')}}</h2>
        <h2>Giáo xứ ít giáo dân nhất: {{$parish->min('totalmember')}}</h2>
        <h2>Bình quân số giáo dân: {{$parish->avg('totalmember')}}</h2>

    </div>


@stop