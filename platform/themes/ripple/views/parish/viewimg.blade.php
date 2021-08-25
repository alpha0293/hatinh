<style type="text/css">
.owl-theme .owl-controls.clickable{
  display: none !important;
}
</style>
<article class="post post--single">
    <header class="post__header text-center">
        <h3 class="post__title">Tất cả hình ảnh của {{$data->name}}</h3>
        <div class="post__meta">
        </div>
        <div class="post__social"></div>
    </header>
    <div class="post__content">
      <div id="list-photo">
	@foreach ($img as $image)
	@if ($image)

	<div class="item" data-src="{{ get_object_image(Arr::get($image, 'img')) }}" data-sub-html="{{ Arr::get($image, 'description') }}">
		<div class="photo-item">
			<div class="thumb">
				<a href="#">
					<img src="{{ get_object_image(Arr::get($image, 'img')) }}" alt="{{ Arr::get($image, 'description') }}">
				</a>
			</div>
		</div>
	</div>

	@endif
	@endforeach
</div>
 
    </div>
<footer class="post__footer">
    <div class="row">

    </div>
</footer>   
</article>



