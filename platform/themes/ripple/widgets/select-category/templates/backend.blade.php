<?php 
$category = get_all_categories();
 ?>
<div class="form-group">
    <label for="widget-name">{{ __('Name') }}</label>
    <input type="text" class="form-control" name="name" value="{{ $config['name'] }}">
</div>
<div class="form-group">
    <label for="exampleFormControlSelect1">Chọn danh mục bài viết</label>
    <select class="form-control" name="category" id="exampleFormControlSelect1">
      <option value="">Chọn danh mục</option>
      @foreach($category as $cate)
      <option value="{{$cate->id}}" @if(isset($config['category']) && ((string)$cate->id == $config['category'])) selected @endif >{{$cate->name}}</option>
      @endforeach
    </select>
</div>
<div class="form-group">
    <label for="widget-name">{{ __('Số bài giới hạn') }}</label>
    <input type="number" class="form-control" name="limit" value="{{ $config['limit'] }}">
</div>

