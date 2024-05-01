<?php

$wordpress_variable_actions = [
    '0.' => [
        'name' => 'activate_{$plugin}',
        'prefix' => 'activate_',
        'suffix' => '',
    ],
    '1.' => [
        'name' => 'add_meta_boxes_{$post_type}',
        'prefix' => 'add_meta_boxes_',
        'suffix' => '',
    ],
    '2.' => [
        'name' => 'add_option_{$option}',
        'prefix' => 'add_option_',
        'suffix' => '',
    ],
    '3.' => [
        'name' => 'add_site_option_{$option}',
        'prefix' => 'add_site_option_',
        'suffix' => '',
    ],
    '4.' => [
        'name' => 'add_{$meta_type}_meta',
        'prefix' => 'add_',
        'suffix' => '_meta',
    ],
    '5.' => [
        'name' => 'added_{$meta_type}_meta',
        'prefix' => 'added_',
        'suffix' => '_meta',
    ],
    '6.' => [
        'name' => 'admin_action_{$action}',
        'prefix' => 'admin_action_',
        'suffix' => '',
    ],
    '7.' => [
        'name' => 'admin_footer-{$hook_suffix}',
        'prefix' => 'admin_footer-',
        'suffix' => '',
    ],
    '8.' => [
        'name' => 'admin_head-{$hook_suffix}',
        'prefix' => 'admin_head-',
        'suffix' => '',
    ],
    '9.' => [
        'name' => 'admin_head_{$content_func}',
        'prefix' => 'admin_head_',
        'suffix' => '',
    ],
    '10.' => [
        'name' => 'admin_post_nopriv_{$action}',
        'prefix' => 'admin_post_nopriv_',
        'suffix' => '',
    ],
    '11.' => [
        'name' => 'admin_post_{$action}',
        'prefix' => 'admin_post_',
        'suffix' => '',
    ],
    '12.' => [
        'name' => 'admin_print_footer_scripts-{$hook_suffix}',
        'prefix' => 'admin_print_footer_scripts-',
        'suffix' => '',
    ],
    '13.' => [
        'name' => 'admin_print_scripts-{$hook_suffix}',
        'prefix' => 'admin_print_scripts-',
        'suffix' => '',
    ],
    '14.' => [
        'name' => 'admin_print_styles-{$hook_suffix}',
        'prefix' => 'admin_print_styles-',
        'suffix' => '',
    ],
    '15.' => [
        'name' => 'after-{$taxonomy}-table',
        'prefix' => 'after-',
        'suffix' => '-table',
    ],
    '16.' => [
        'name' => 'after_plugin_row_{$plugin_file}',
        'prefix' => 'after_plugin_row_',
        'suffix' => '',
    ],
    '17.' => [
        'name' => 'after_theme_row_{$stylesheet}',
        'prefix' => 'after_theme_row_',
        'suffix' => '',
    ],
    '18.' => [
        'name' => 'comment_{$new_status}_{$comment->comment_type}',
        'prefix' => 'comment_',
        'suffix' => '',
    ],
    '19.' => [
        'name' => 'comment_{$old_status}_to_{$new_status}',
        'prefix' => 'comment_',
        'suffix' => '',
    ],
    '20.' => [
        'name' => 'create_{$taxonomy}',
        'prefix' => 'create_',
        'suffix' => '',
    ],
    '21.' => [
        'name' => 'created_{$taxonomy}',
        'prefix' => 'created_',
        'suffix' => '',
    ],
    '22.' => [
        'name' => 'customize_post_value_set_{$setting_id}',
        'prefix' => 'customize_post_value_set_',
        'suffix' => '',
    ],
    '23.' => [
        'name' => 'customize_preview_{$this->id}',
        'prefix' => 'customize_preview_',
        'suffix' => '',
    ],
    '24.' => [
        'name' => 'customize_preview_{$this->type}',
        'prefix' => 'customize_preview_',
        'suffix' => '',
    ],
    '25.' => [
        'name' => 'customize_render_control_{$this->id}',
        'prefix' => 'customize_render_control_',
        'suffix' => '',
    ],
    '26.' => [
        'name' => 'customize_render_panel_{$this->id}',
        'prefix' => 'customize_render_panel_',
        'suffix' => '',
    ],
    '27.' => [
        'name' => 'customize_render_section_{$this->id}',
        'prefix' => 'customize_render_section_',
        'suffix' => '',
    ],
    '28.' => [
        'name' => 'customize_save_{$id_base}',
        'prefix' => 'customize_save_',
        'suffix' => '',
    ],
    '29.' => [
        'name' => 'customize_update_{$this->type}',
        'prefix' => 'customize_update_',
        'suffix' => '',
    ],
    '30.' => [
        'name' => 'deactivate_{$plugin}',
        'prefix' => 'deactivate_',
        'suffix' => '',
    ],
    '31.' => [
        'name' => 'delete_option_{$option}',
        'prefix' => 'delete_option_',
        'suffix' => '',
    ],
    '32.' => [
        'name' => 'delete_site_option_{$option}',
        'prefix' => 'delete_site_option_',
        'suffix' => '',
    ],
    '33.' => [
        'name' => 'delete_site_transient_{$transient}',
        'prefix' => 'delete_site_transient_',
        'suffix' => '',
    ],
    '34.' => [
        'name' => 'delete_transient_{$transient}',
        'prefix' => 'delete_transient_',
        'suffix' => '',
    ],
    '35.' => [
        'name' => 'delete_{$meta_type}_meta',
        'prefix' => 'delete_',
        'suffix' => '_meta',
    ],
    '36.' => [
        'name' => 'delete_{$meta_type}meta',
        'prefix' => 'delete_',
        'suffix' => 'meta',
    ],
    '37.' => [
        'name' => 'delete_{$taxonomy}',
        'prefix' => 'delete_',
        'suffix' => '',
    ],
    '38.' => [
        'name' => 'deleted_{$meta_type}_meta',
        'prefix' => 'deleted_',
        'suffix' => '_meta',
    ],
    '39.' => [
        'name' => 'deleted_{$meta_type}meta',
        'prefix' => 'deleted_',
        'suffix' => 'meta',
    ],
    '40.' => [
        'name' => 'do_feed_{$feed}',
        'prefix' => 'do_feed_',
        'suffix' => '',
    ],
    '41.' => [
        'name' => 'edit_post_{$post->post_type}',
        'prefix' => 'edit_post_',
        'suffix' => '',
    ],
    '42.' => [
        'name' => 'edit_{$taxonomy}',
        'prefix' => 'edit_',
        'suffix' => '',
    ],
    '43.' => [
        'name' => 'edited_{$taxonomy}',
        'prefix' => 'edited_',
        'suffix' => '',
    ],
    '44.' => [
        'name' => 'get_template_part_{$slug}',
        'prefix' => 'get_template_part_',
        'suffix' => '',
    ],
    '45.' => [
        'name' => 'in_plugin_update_message-{$file}',
        'prefix' => 'in_plugin_update_message-',
        'suffix' => '',
    ],
    '46.' => [
        'name' => 'in_theme_update_message-{$theme_key}',
        'prefix' => 'in_theme_update_message-',
        'suffix' => '',
    ],
    '47.' => [
        'name' => 'install_plugins_pre_{$tab}',
        'prefix' => 'install_plugins_pre_',
        'suffix' => '',
    ],
    '48.' => [
        'name' => 'install_plugins_{$tab}',
        'prefix' => 'install_plugins_',
        'suffix' => '',
    ],
    '49.' => [
        'name' => 'install_themes_pre_{$tab}',
        'prefix' => 'install_themes_pre_',
        'suffix' => '',
    ],
    '50.' => [
        'name' => 'install_themes_{$tab}',
        'prefix' => 'install_themes_',
        'suffix' => '',
    ],
    '51.' => [
        'name' => 'load-importer-{$importer}',
        'prefix' => 'load-importer-',
        'suffix' => '',
    ],
    '52.' => [
        'name' => 'load-{$page_hook}',
        'prefix' => 'load-',
        'suffix' => '',
    ],
    '53.' => [
        'name' => 'load-{$pagenow}',
        'prefix' => 'load-',
        'suffix' => '',
    ],
    '54.' => [
        'name' => 'load-{$plugin_page}',
        'prefix' => 'load-',
        'suffix' => '',
    ],
    '55.' => [
        'name' => 'login_form_{$action}',
        'prefix' => 'login_form_',
        'suffix' => '',
    ],
    '56.' => [
        'name' => 'manage_{$post->post_type}_posts_custom_column',
        'prefix' => 'manage_',
        'suffix' => '_posts_custom_column',
    ],
    '57.' => [
        'name' => 'manage_{$this->screen->id}_custom_column',
        'prefix' => 'manage_',
        'suffix' => '_custom_column',
    ],
    '58.' => [
        'name' => 'manage_{$this->screen->id}_custom_column_js_template',
        'prefix' => 'manage_',
        'suffix' => '_custom_column_js_template',
    ],
    '59.' => [
        'name' => 'media_upload_{$tab}',
        'prefix' => 'media_upload_',
        'suffix' => '',
    ],
    '60.' => [
        'name' => 'media_upload_{$type}',
        'prefix' => 'media_upload_',
        'suffix' => '',
    ],
    '61.' => [
        'name' => 'network_admin_edit_{$action}',
        'prefix' => 'network_admin_edit_',
        'suffix' => '',
    ],
    '62.' => [
        'name' => 'post_action_{$action}',
        'prefix' => 'post_action_',
        'suffix' => '',
    ],
    '63.' => [
        'name' => 'pre_delete_site_option_{$option}',
        'prefix' => 'pre_delete_site_option_',
        'suffix' => '',
    ],
    '64.' => [
        'name' => 'registered_post_type_{$post_type}',
        'prefix' => 'registered_post_type_',
        'suffix' => '',
    ],
    '65.' => [
        'name' => 'registered_taxonomy_{$taxonomy}',
        'prefix' => 'registered_taxonomy_',
        'suffix' => '',
    ],
    '66.' => [
        'name' => 'requests-{$hook}',
        'prefix' => 'requests-',
        'suffix' => '',
    ],
    '67.' => [
        'name' => 'rest_after_insert_{$this->post_type}',
        'prefix' => 'rest_after_insert_',
        'suffix' => '',
    ],
    '68.' => [
        'name' => 'rest_after_insert_{$this->taxonomy}',
        'prefix' => 'rest_after_insert_',
        'suffix' => '',
    ],
    '69.' => [
        'name' => 'rest_delete_{$this->post_type}',
        'prefix' => 'rest_delete_',
        'suffix' => '',
    ],
    '70.' => [
        'name' => 'rest_delete_{$this->taxonomy}',
        'prefix' => 'rest_delete_',
        'suffix' => '',
    ],
    '71.' => [
        'name' => 'rest_insert_{$this->post_type}',
        'prefix' => 'rest_insert_',
        'suffix' => '',
    ],
    '72.' => [
        'name' => 'rest_insert_{$this->taxonomy}',
        'prefix' => 'rest_insert_',
        'suffix' => '',
    ],
    '73.' => [
        'name' => 'save_post_{$post->post_type}',
        'prefix' => 'save_post_',
        'suffix' => '',
    ],
    '74.' => [
        'name' => 'saved_{$taxonomy}',
        'prefix' => 'saved_',
        'suffix' => '',
    ],
    '75.' => [
        'name' => 'set_site_transient_{$transient}',
        'prefix' => 'set_site_transient_',
        'suffix' => '',
    ],
    '76.' => [
        'name' => 'set_transient_{$transient}',
        'prefix' => 'set_transient_',
        'suffix' => '',
    ],
    '77.' => [
        'name' => 'uninstall_{$file}',
        'prefix' => 'uninstall_',
        'suffix' => '',
    ],
    '78.' => [
        'name' => 'update-core-custom_{$action}',
        'prefix' => 'update-core-custom_',
        'suffix' => '',
    ],
    '79.' => [
        'name' => 'update-custom_{$action}',
        'prefix' => 'update-custom_',
        'suffix' => '',
    ],
    '80.' => [
        'name' => 'update_option_{$option}',
        'prefix' => 'update_option_',
        'suffix' => '',
    ],
    '81.' => [
        'name' => 'update_site_option_{$option}',
        'prefix' => 'update_site_option_',
        'suffix' => '',
    ],
    '82.' => [
        'name' => 'update_{$meta_type}_meta',
        'prefix' => 'update_',
        'suffix' => '_meta',
    ],
    '83.' => [
        'name' => 'updated_{$meta_type}_meta',
        'prefix' => 'updated_',
        'suffix' => '_meta',
    ],
    '84.' => [
        'name' => 'wp_ajax_nopriv_{$action}',
        'prefix' => 'wp_ajax_nopriv_',
        'suffix' => '',
    ],
    '85.' => [
        'name' => 'wp_ajax_{$action}',
        'prefix' => 'wp_ajax_',
        'suffix' => '',
    ],
    '86.' => [
        'name' => '{$taxonomy}_add_form',
        'prefix' => '',
        'suffix' => '_add_form',
    ],
    '87.' => [
        'name' => '{$taxonomy}_add_form_fields',
        'prefix' => '',
        'suffix' => '_add_form_fields',
    ],
    '88.' => [
        'name' => '{$taxonomy}_edit_form',
        'prefix' => '',
        'suffix' => '_edit_form',
    ],
    '89.' => [
        'name' => '{$taxonomy}_edit_form_fields',
        'prefix' => '',
        'suffix' => '_edit_form_fields',
    ],
    '90.' => [
        'name' => '{$taxonomy}_pre_add_form',
        'prefix' => '',
        'suffix' => '_pre_add_form',
    ],
    '91.' => [
        'name' => '{$taxonomy}_pre_edit_form',
        'prefix' => '',
        'suffix' => '_pre_edit_form',
    ],
    '92.' => [
        'name' => '{$taxonomy}_term_edit_form_tag',
        'prefix' => '',
        'suffix' => '_term_edit_form_tag',
    ],
    '93.' => [
        'name' => '{$taxonomy}_term_edit_form_top',
        'prefix' => '',
        'suffix' => '_term_edit_form_top',
    ],
    '94.' => [
        'name' => '{$taxonomy}_term_new_form_tag',
        'prefix' => '',
        'suffix' => '_term_new_form_tag',
    ],
];
