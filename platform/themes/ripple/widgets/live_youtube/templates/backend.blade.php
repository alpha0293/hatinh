<div class="form-group">
    <label for="widget-name">{{ __('Bật phần phát trực tiếp?') }}</label> <br>
    <label class="switch">
        <input type="checkbox" id="turn" name="turn" value="co" @if($config['turn']=='co') checked @endif >
      <span class="slider-switch round"></span>
</label>
</div>

<div class="form-group">
    <label for="widget-name">{{ __('Name') }}</label>
    <input type="text" class="form-control" name="name" value="{{ $config['name'] }}">
</div>

<div class="form-group">
    <label for="widget-name">{{ __('Live với Trang Youtube Giáo Phận Hà Tĩnh? ') }}</label> <br>
    <input type="radio" id="co" name="channel" value="co" @if($config['channel']=='khong') checked="false" @else checked="true" @endif>
    <label for="co">Đồng ý</label> <br>
    <p>(Nếu bị lỗi vui lòng chọn phần dưới.)</p>
    <input type="radio" id="khong" name="channel" value="khong" @if($config['channel']=='khong') checked="true"@endif>
    <label for="khong">Kênh khác hoặc Facbook</label>
</div>
<div class="form-group channel-khac">
    <label for="widget-name">{{ __('Nhập mã nhúng: ') }}</label>
    <textarea class="form-control" name="embed-different" rows="5" >{{ $config['embed-different'] }}</textarea>
</div>