

<div class="form-group">
    <label for="widget-name">{{ __('Name') }}</label>
    <input type="text" class="form-control" name="name" value="{{ $config['name'] }}">
</div>
<div class="form-group">
    <label for="widget-name">{{ __('Cho hiển thị tên?') }}</label> <br>
    <input type="radio" id="co" name="display" value="co" @if($config['display']=='co') checked="true"@endif>
    <label for="co">Có</label> <br>
    <input type="radio" id="khonng" name="display" value="khong" @if($config['display']=='khong') checked="true"@endif>
    <label for="khong">Không</label>
</div>
<div class="form-group">
    <label for="widget-name">{{ __('Hình đại diện') }}</label>

{!! Form::mediaImage('image', $config['image'] ?? setting('media_default_placeholder_image')) !!}
</div>
<div class="form-group">
    <label for="widget-name">{{ __('Đường dẫn') }}</label>
    <input type="text" class="form-control" name="url" value="{{ $config['url'] }}">
</div>
