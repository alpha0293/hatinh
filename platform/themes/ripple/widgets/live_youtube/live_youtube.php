<?php

use Botble\Widget\AbstractWidget;

class LiveYoutubeWidget extends AbstractWidget
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
    protected $widgetDirectory = 'live_youtube';

    /**
     * Widget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'        => 'Trực tiếp Youtube-Facebook',
            'channel'     => 'Bạn muốn live từ kênh youtube Giáo phận Hà Tĩnh?',
            'turn' => 'khong',
            'embed-different'  => 'Nhập mã nhúng',
            'description' => __('Tạo livestream từ youtube'),
        ]);
    }
}
