@if ($page->id != setting('show_on_front'))
    @php Theme::set('section-name', $page->name) @endphp
    <article class="post post--single">
        <header class="post__header text-center">
        <h3 class="post__title">{{ $page->name }}</h3>
        <div class="post__social"></div>
    </header>
        <div class="post__content">
            <div class="post-thumb mt-50 par_thumb">
                <img src="{{ get_object_image($page->image, 'medium') }}">
            </div>
            {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
        </div>
        @if (defined('GALLERY_MODULE_SCREEN_NAME') && !empty($galleries = gallery_meta_data($page)))
                {!! render_object_gallery($galleries) !!}
            @endif
    </article>
@else
    {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
@endif


