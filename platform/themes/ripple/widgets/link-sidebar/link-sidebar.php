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
            'avatar'        => 'Hình đại diện',
            'description' => __('This is a sample widget'),
        ]);
    }
}
