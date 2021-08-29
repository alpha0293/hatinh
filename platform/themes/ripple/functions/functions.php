<?php

require_once __DIR__ . '/../vendor/autoload.php';

register_page_template([
    'no-sidebar' => 'No sidebar',
]);

register_sidebar([
    'id'          => 'top_sidebar',
    'name'        => __('Top sidebar'),
    'description' => __('This is top sidebar section'),
]);

register_sidebar([
    'id'          => 'footer_sidebar',
    'name'        => __('Footer sidebar'),
    'description' => __('This is footer sidebar section'),
]);
register_sidebar([
    'id'          => 'livestream_sidebar',
    'name'        => __('Vùng hiển thị livestream'),
    'description' => __('Hiển thị khi livestream'),
]);
add_shortcode('google-map', 'Google map', 'Custom map', function ($shortCode) {
    return Theme::partial('short-codes.google-map', ['address' => $shortCode->content]);
});

add_shortcode('youtube-video', 'Youtube video', 'Add youtube video', function ($shortCode) {
    return Theme::partial('short-codes.video', ['url' => $shortCode->content]);
});

shortcode()->setAdminConfig('google-map', Theme::partial('short-codes.google-map-admin-config'));
shortcode()->setAdminConfig('youtube-video', Theme::partial('short-codes.youtube-admin-config'));

add_shortcode('featured-posts', 'Featured posts', 'Featured posts', function () {
    return Theme::partial('short-codes.featured-posts');
});

add_shortcode('what-new-posts', 'What\'s new posts', 'What\'s new posts', function () {
    return Theme::partial('short-codes.what-new-posts');
});

add_shortcode('best-for-you-posts', 'Best for you posts', 'Best for you posts', function () {
    return Theme::partial('short-codes.best-for-you-posts');
});

add_shortcode('all-galleries', 'All Galleries', 'All Galleries', function () {
    return Theme::partial('short-codes.all-galleries');
});
add_shortcode('same-category', 'Same Category', 'Same Category', function () {
    return Theme::partial('short-codes.same-category');
});

theme_option()
    ->setField([
        'id'         => 'site_description',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Site description'),
        'attributes' => [
            'name'    => 'site_description',
            'value'   => __('A young diocese in Vietnam'),
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 255,
            ],
        ],
    ])
    ->setField([
        'id'         => 'primary_font',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'googleFonts',
        'label'      => __('Primary font'),
        'attributes' => [
            'name'  => 'primary_font',
            'value' => 'Roboto',
        ],
    ])
    ->setField([
        'id'         => 'address',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Address'),
        'attributes' => [
            'name'    => 'address',
            'value'   => theme_option('website')  ?? 'Văn Hạnh - Thạch Trung - tp. Hà Tĩnh - Hà Tĩnh ',
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 255,
            ],
        ],
    ])
    ->setField([
        'id'         => 'website',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'url',
        'label'      => __('Website'),
        'attributes' => [
            'name'    => 'website',
            'value'   =>  theme_option('website')  ?? null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 255,
            ],
        ],
    ])
    ->setField([
        'id'         => 'contact_email',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'email',
        'label'      => __('Email'),
        'attributes' => [
            'name'    => 'contact_email',
            'value'   =>  theme_option('contact_email')  ?? null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 120,
            ],
        ],
    ])
    ->setField([
        'id'         => 'numberphone',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Số điện thoại'),
        'attributes' => [
            'name'    => 'numberphone',
            'value'   =>  theme_option('numberphone')  ?? null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 120,
            ],
        ],
    ])
    ->setField([
        'id'         => 'telephone',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Số điện thoại khác'),
        'attributes' => [
            'name'    => 'telephone',
            'value'   =>  theme_option('telephone')  ?? null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 120,
            ],
        ],
    ])
    ->setSection([
        'title'      => __('Social'),
        'desc'       => __('Social links'),
        'id'         => 'opt-text-subsection-social',
        'subsection' => true,
        'icon'       => 'fa fa-share-alt',
    ])
    ->setField([
        'id'         => 'facebook',
        'section_id' => 'opt-text-subsection-social',
        'type'       => 'text',
        'label'      => 'Facebook',
        'attributes' => [
            'name'    => 'facebook',
            'value'   => null,
            'options' => [
                'class' => 'form-control',
            ],
        ],
    ])
    ->setField([
        'id'         => 'twitter',
        'section_id' => 'opt-text-subsection-social',
        'type'       => 'text',
        'label'      => 'Twitter',
        'attributes' => [
            'name'    => 'twitter',
            'value'   => null,
            'options' => [
                'class' => 'form-control',
            ],
        ],
    ])
    ->setField([
        'id'         => 'youtube',
        'section_id' => 'opt-text-subsection-social',
        'type'       => 'text',
        'label'      => 'Youtube',
        'attributes' => [
            'name'    => 'youtube',
            'value'   => null,
            'options' => [
                'class' => 'form-control',
            ],
        ],
    ])
    ->setSection([
        'title'      => __('Danh mục cho trang tin tức'),
        'desc'       => __('News Categories'),
        'id'         => 'category_news',
        'subsection' => true,
        'icon'       => 'fa fa-book',
    ])
    ->setField([
    'id' => 'category1',
    'section_id' => 'category_news',
    'type' => 'select', // select or customSelect
    'label' => __('Danh mục số 1'),
    'attributes' => [
        'name' => 'category1',
        'data' => get_all_categories()->pluck('name','id'),
        'value' => null, // default value
        'options' => [
            'class' => 'form-control',
        ],
    ],
    ])
    ->setField([
    'id' => 'category2',
    'section_id' => 'category_news',
    'type' => 'select', // select or customSelect
    'label' => __('Danh mục số 2'),
    'attributes' => [
        'name' => 'category2',
        'data' => get_all_categories()->pluck('name','id'),
        'value' => null, // default value
        'options' => [
            'class' => 'form-control',
        ],
    ],
    ])
    ->setField([
    'id' => 'category3',
    'section_id' => 'category_news',
    'type' => 'select', // select or customSelect
    'label' => __('Danh mục số 3'),
    'attributes' => [
        'name' => 'category3',
        'data' => get_all_categories()->pluck('name','id'),
        'value' => null, // default value
        'options' => [
            'class' => 'form-control',
        ],
    ],
    ]);

add_action('init', 'change_media_config', 124);

if (!function_exists('change_media_config')) {
    function change_media_config() {
        config([
            'filesystems.default'           => 'public',
            'filesystems.disks.public.root' => public_path('storage'),
        ]);
    }
}

RvMedia::addSize('featured', 560, 380)->addSize('medium', 540, 360);
