<article class="data data--single">
    <header class="data__header">
        <h3 class="data__title">{{ $data->first()->name }}</h3>
        <div class="data__social"></div>
    </header>
    <div class="data__content">
        <h2>Lịch Phụng Vụ Giáo phận</h2>
        {!! $data->first()->content !!}
    </div>
    <footer class="data__footer">
    	
    </footer>
    <br />
</article>
