<?php

use Botble\Widget\AbstractWidget;

class SelectCategoryWidget extends AbstractWidget
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
    protected $widgetDirectory = 'select-category';

    /**
     * Widget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'        => 'Chọn danh mục hiển thị',
            'category' => 'Danh mục',
            'limit' => 'Giới hạn',
            'description' => __('This is a sample widget'),
        ]);
    }
}
