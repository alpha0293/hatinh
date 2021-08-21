<ul {!! $options !!}>
    @foreach ($menu_nodes as $key => $row)
    @if($row->title=="Giáo Hạt"||$row->title=="Giáo Hạt | Giáo xứ")
    @if($data_deanery!=null)
    <li class="menu-item menu-item-has-children {{ $row->css_class }} @if ($row->url == Request::url()) active @endif">
        <a href="{{ route('deanery') }}" target="{{ $row->target }}">
            @if ($row->icon_font)<i class='{{ trim($row->icon_font) }}'></i> @endif{{ $row->title }}
        </a>
        <ul class="sub-menu">
            @foreach($data_deanery as $deanery)
            <li class="menu-item">
                <a href="{{$deanery->url}}">{{$deanery->name}}</a>
            </li>
            @endforeach
            
        </ul>
        
    </li>
    
    @endif
    @else
    <li class="menu-item @if ($row->has_child) menu-item-has-children @endif {{ $row->css_class }} @if ($row->url == Request::url())  @endif">
        <a href="{{ $row->url }}" target="{{ $row->target }}">
            @if ($row->icon_font)<i class='{{ trim($row->icon_font) }}'></i> @endif{{ $row->title }}
        </a>
        @if ($row->has_child)
            {!!
                Menu::generateMenu([
                    'slug' => $menu->slug,
                    'view' => 'main-menu',
                    'options' => ['class' => 'sub-menu'],
                    'parent_id' => $row->id,
                ])
            !!}
        @endif
    </li>
    @endif
    @endforeach
</ul>
