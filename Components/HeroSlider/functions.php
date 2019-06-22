<?php

namespace Flynt\Components\HeroSlider;

use Flynt\Api;
use Flynt\Utils\Options;

 add_filter('Flynt/addComponentData?name=HeroSlider', function ($data) {
    $translatableOptions = Options::get('translatableOptions', 'feature', 'SliderOptions');
    $data['jsonData'] = [
        'options' => array_merge($translatableOptions, $data['options']),
    ];

    return $data;
});

Api::registerFields('HeroSlider', [
    'layout' => [
        'name' => 'heroSlider',
        'label' => 'Hero: Slider',
        'sub_fields' => [
            [
                'label' => 'Images',
                'name' => 'imagesTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => 'Images',
                'type' => 'group',
                'name' => 'images',
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'label' => 'Desktop Image',
                        'name' => 'imageDesktop',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'mime_types' => 'jpg,jpeg',
                        'required' => 1,
                        'instructions' => 'Recommended resolution greater than 2048 x 800 px.'
                    ],
                    [
                        'label' => 'Mobile Image',
                        'name' => 'imageMobile',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'mime_types' => 'jpg,jpeg',
                        'required' => 1,
                        'instructions' => 'Recommended resolution greater than 750 x 800 px.'
                    ]
                ]
            ],
            [
                'label' => 'Content',
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => 'Content',
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'media_upload' => 0,
                'toolbar' => 'full',
                'wrapper' => [
                    'class' => 'autosize',
                ],
            ],
            [
                'label' => 'Options',
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    [
                        'label' => 'Enable Autoplay',
                        'name' => 'autoplay',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1
                    ],
                    [
                        'label' => 'Autoplay Speed (in milliseconds)',
                        'name' => 'autoplaySpeed',
                        'type' => 'number',
                        'min' => 2000,
                        'default_value' => 4000,
                        'required' => 1,
                        'step' => 1,
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'autoplay',
                                    'operator' => '==',
                                    'value' => 1
                                ]
                            ]
                        ],
                    ],
                ],
            ],
        ]
    ]
]);
