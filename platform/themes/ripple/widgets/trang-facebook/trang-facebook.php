<?php

use Botble\Widget\AbstractWidget;

class TrangFacebookWidget extends AbstractWidget
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
    protected $widgetDirectory = 'trang-facebook';

    /**
     * Widget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'        => 'Trang Facebook',
            'facebook_url'        => 'Đường link',
            'facebook_name'        => 'Tên hiển thị',
            'description' => __('This is a trang facebook giáo phận widget'),
        ]);
    }
}
