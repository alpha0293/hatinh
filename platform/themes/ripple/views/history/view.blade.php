
@php Theme::set('section-name', $data->name) @endphp

<article class="data data--single">
    <header class="data__header">
        <h3 class="data__title">{{ $data->name }}</h3>
        <div class="data__social"></div>
    </header>
    <div class="data__content">
        @if (defined('GALLERY_MODULE_SCREEN_NAME') && !empty($galleries = gallery_meta_data($data)))
		  {!! render_object_gallery($galleries) !!}
		@endif
        {!! $data->content !!}
        <div class="fb-like" data-href="{{ Request::url() }}" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
    </div>
    <footer class="data__footer">
    	
    </footer>
    <br />
    {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, Theme::partial('comments')) !!}
</article>
