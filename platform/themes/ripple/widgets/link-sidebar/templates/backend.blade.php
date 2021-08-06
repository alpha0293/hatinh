<div class="form-group">
    <label for="widget-name">{{ __('Name') }}</label>
    <input type="text" class="form-control" name="name" value="{{ $config['name'] }}">
</div>
<div class="form-group">
    <label for="widget-name">{{ __('Hình đại diện') }}</label>
    <input type="text" class="form-control" name="avatar" value="{{ $config['avatar'] }}">
    <div class="image-box-actions">
                        <a href="#" class="custom-select-image">
                            {{ trans('core/base::forms.choose_image') }}
                        </a>
                    </div>
</div>
