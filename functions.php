<?php

add_theme_support('post-thumbnails');


add_action('customize_register', function($wp_customize){

  // 新建分组（可复用现有分组就删这段）
  $wp_customize->add_section('mytheme_fields', [
    'title' => '主题设置', 'priority' => 30
  ]);

  // 定义要生成的文本字段
  $fields = [
    'mytheme_bc' => ['label'=>'背景',   'default'=>''],
    'mytheme_icp' => ['label'=>'备案',   'default'=>''],
    'mytheme_s2'       => ['label'=>'上句',   'default'=>''   ],
    'mytheme_s1'       => ['label'=>'下句',   'default'=>''   ],
    'mytheme_av'       => ['label'=>'头像',   'default'=>''   ],
  ];

  foreach ($fields as $id => $cfg) {
    $wp_customize->add_setting($id, [
      'default' => $cfg['default'],
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control($id, [
      'label' => $cfg['label'],
      'section' => 'mytheme_fields',
      'type' => 'text',
    ]);
  }
});




add_action('after_setup_theme', function () {
  add_theme_support('html5', ['comment-list','comment-form','search-form','gallery','caption']);
});

add_action('wp_enqueue_scripts', function () {
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
});