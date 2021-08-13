<?php

use Botble\Widget\AbstractWidget;

class GiaolyWidget extends AbstractWidget
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
    protected $frontendTemplate = 'frontend';

    /**
     * @var string
     */
    protected $backendTemplate = 'backend';

    /**
     * @var string
     */
    protected $widgetDirectory = 'giaoly';

    /**
     * Widget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'        => 'Giáo lý hằng tuần',
            'week'        => 'Tuần',
            'content'        => 'Nội dung',
            'description' => __('widget bài giáo lý hằng tuần'),
        ]);
    }
}
