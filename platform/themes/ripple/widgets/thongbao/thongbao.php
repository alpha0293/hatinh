<?php

use Botble\Widget\AbstractWidget;

class ThongbaoWidget extends AbstractWidget
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
    protected $widgetDirectory = 'thongbao';

    /**
     * Widget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'        => 'Thông báo',
            'description' => __('những bài viết có category là thông báo'),
            'category' => 'Danh mục',
            'limit' => 'Giới hạn',
        ]);
    }
}
