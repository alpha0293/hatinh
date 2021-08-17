

<div id="list-photo">
	@foreach ($galleries as $image)
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

<!-- --------------------------------------------- -->


