
@php Theme::set('section-name', $data->name) @endphp
<article class="data data--single">
    <header class="data__header">
        <h3 class="data__title">{{ $data->name }}</h3>
        <div class="data__social"></div>
    </header>
    <div class="data__content">
        {!! $data->content !!}
        <div class="fb-like" style="display: flex;" data-href="{{ Request::url() }}" data-layout="button_count" data-send="true" data-action="like" data-show-faces="true" data-share="true"></div>
    </div>
    <footer class="data__footer">
    	
    </footer>
    <br />
    {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, Theme::partial('comments')) !!}
</article>
