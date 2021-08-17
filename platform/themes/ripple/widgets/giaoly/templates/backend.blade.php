<div class="form-group">
    <label for="widget-name">{{ __('Name') }}</label>
    <input type="text" class="form-control" name="name" value="{{ $config['name'] }}">
</div>
<div class="form-group">
    <label for="widget-name">{{ __('Tuần: ') }}</label>
    <input type="text" class="form-control" name="week" value="{{ $config['week'] }}">
</div>
<div class="form-group">
    <label for="widget-name">{{ __('Nội dung: ') }}</label>
    <textarea class="form-control" name="content" rows="10" >{{ $config['content'] }}</textarea>
</div>
