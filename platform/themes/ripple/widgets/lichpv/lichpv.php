<?php

use Botble\Widget\AbstractWidget;

class LichpvWidget extends AbstractWidget
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
    protected $widgetDirectory = 'lichpv';

    /**
     * Widget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'        => 'Lichpv',
            'image'        => 'Hình đại diện Lịch PV',
            'display'        => 'Cho phép hiển thị tên?',
            'description' => __('Lịch phụng vụ'),
        ]);
    }
}
