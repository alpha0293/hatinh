@if (defined('GALLERY_MODULE_SCREEN_NAME') && !empty($galleries = gallery_meta_data($data)))
  {!! render_object_gallery($galleries) !!}
@endif