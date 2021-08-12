<?php

use Botble\Widget\AbstractWidget;

class LinkSidebarWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * @var string
     */
    protected $widgetDirectory = 'link-sidebar';

    /**
     * Widget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'        => 'Đường dẫn sidebar',
            'image'        => 'Hình đại diện sidebar',
            'url'        => 'Đường dẫn',
            'display'        => 'Cho phép hiển thị tên?',
            'description' => __('Thêm đường dẫn side bên phải'),
        ]);
    }
}
