<?php

$wordpress_dynamic_actions = [
    '0.' => [
        'name' => 'activate_{$plugin}',
        'norm_name' => 'activate_{$var}',
        'prefix' => 'activate_',
        'suffix' => '',
    ],
    '1.' => [
        'name' => 'add_meta_boxes_{$post_type}',
        'norm_name' => 'add_meta_boxes_{$var}',
        'prefix' => 'add_meta_boxes_',
        'suffix' => '',
    ],
    '2.' => [
        'name' => 'add_{$meta_type}_meta',
        'norm_name' => 'add_{$var}_meta',
        'prefix' => 'add_',
        'suffix' => '_meta',
    ],
    '3.' => [
        'name' => 'added_{$meta_type}_meta',
        'norm_name' => 'added_{$var}_meta',
        'prefix' => 'added_',
        'suffix' => '_meta',
    ],
    '4.' => [
        'name' => 'admin_action_{$action}',
        'norm_name' => 'admin_action_{$var}',
        'prefix' => 'admin_action_',
        'suffix' => '',
    ],
    '5.' => [
        'name' => 'admin_footer-{$hook_suffix}',
        'norm_name' => 'admin_footer-{$var}',
        'prefix' => 'admin_footer-',
        'suffix' => '',
    ],
    '6.' => [
        'name' => 'admin_head-{$hook_suffix}',
        'norm_name' => 'admin_head-{$var}',
        'prefix' => 'admin_head-',
        'suffix' => '',
    ],
    '7.' => [
        'name' => 'admin_post_nopriv_{$action}',
        'norm_name' => 'admin_post_nopriv_{$var}',
        'prefix' => 'admin_post_nopriv_',
        'suffix' => '',
    ],
    '8.' => [
        'name' => 'admin_post_{$action}',
        'norm_name' => 'admin_post_{$var}',
        'prefix' => 'admin_post_',
        'suffix' => '',
    ],
    '9.' => [
        'name' => 'admin_print_footer_scripts-{$hook_suffix}',
        'norm_name' => 'admin_print_footer_scripts-{$var}',
        'prefix' => 'admin_print_footer_scripts-',
        'suffix' => '',
    ],
    '10.' => [
        'name' => 'admin_print_scripts-{$hook_suffix}',
        'norm_name' => 'admin_print_scripts-{$var}',
        'prefix' => 'admin_print_scripts-',
        'suffix' => '',
    ],
    '11.' => [
        'name' => 'admin_print_styles-{$hook_suffix}',
        'norm_name' => 'admin_print_styles-{$var}',
        'prefix' => 'admin_print_styles-',
        'suffix' => '',
    ],
    '12.' => [
        'name' => 'after-{$taxonomy}-table',
        'norm_name' => 'after-{$var}-table',
        'prefix' => 'after-',
        'suffix' => '-table',
    ],
    '13.' => [
        'name' => 'after_plugin_row_{$plugin_file}',
        'norm_name' => 'after_plugin_row_{$var}',
        'prefix' => 'after_plugin_row_',
        'suffix' => '',
    ],
    '14.' => [
        'name' => 'after_theme_row_{$stylesheet}',
        'norm_name' => 'after_theme_row_{$var}',
        'prefix' => 'after_theme_row_',
        'suffix' => '',
    ],
    '15.' => [
        'name' => 'deactivate_{$plugin}',
        'norm_name' => 'deactivate_{$var}',
        'prefix' => 'deactivate_',
        'suffix' => '',
    ],
    '16.' => [
        'name' => 'delete_{$meta_type}_meta',
        'norm_name' => 'delete_{$var}_meta',
        'prefix' => 'delete_',
        'suffix' => '_meta',
    ],
    '17.' => [
        'name' => 'delete_{$meta_type}meta',
        'norm_name' => 'delete_{$var}meta',
        'prefix' => 'delete_',
        'suffix' => 'meta',
    ],
    '18.' => [
        'name' => 'deleted_{$meta_type}_meta',
        'norm_name' => 'deleted_{$var}_meta',
        'prefix' => 'deleted_',
        'suffix' => '_meta',
    ],
    '19.' => [
        'name' => 'deleted_{$meta_type}meta',
        'norm_name' => 'deleted_{$var}meta',
        'prefix' => 'deleted_',
        'suffix' => 'meta',
    ],
    '20.' => [
        'name' => 'get_template_part_{$slug}',
        'norm_name' => 'get_template_part_{$var}',
        'prefix' => 'get_template_part_',
        'suffix' => '',
    ],
    '21.' => [
        'name' => 'in_plugin_update_message-{$file}',
        'norm_name' => 'in_plugin_update_message-{$var}',
        'prefix' => 'in_plugin_update_message-',
        'suffix' => '',
    ],
    '22.' => [
        'name' => 'in_theme_update_message-{$theme_key}',
        'norm_name' => 'in_theme_update_message-{$var}',
        'prefix' => 'in_theme_update_message-',
        'suffix' => '',
    ],
    '23.' => [
        'name' => 'install_plugins_pre_{$tab}',
        'norm_name' => 'install_plugins_pre_{$var}',
        'prefix' => 'install_plugins_pre_',
        'suffix' => '',
    ],
    '24.' => [
        'name' => 'install_plugins_{$tab}',
        'norm_name' => 'install_plugins_{$var}',
        'prefix' => 'install_plugins_',
        'suffix' => '',
    ],
    '25.' => [
        'name' => 'install_themes_pre_{$tab}',
        'norm_name' => 'install_themes_pre_{$var}',
        'prefix' => 'install_themes_pre_',
        'suffix' => '',
    ],
    '26.' => [
        'name' => 'install_themes_{$tab}',
        'norm_name' => 'install_themes_{$var}',
        'prefix' => 'install_themes_',
        'suffix' => '',
    ],
    '27.' => [
        'name' => 'load-importer-{$importer}',
        'norm_name' => 'load-importer-{$var}',
        'prefix' => 'load-importer-',
        'suffix' => '',
    ],
    '28.' => [
        'name' => 'load-{$page_hook}',
        'norm_name' => 'load-{$var}',
        'prefix' => 'load-',
        'suffix' => '',
    ],
    '29.' => [
        'name' => 'load-{$pagenow}',
        'norm_name' => 'load-{$var}',
        'prefix' => 'load-',
        'suffix' => '',
    ],
    '30.' => [
        'name' => 'load-{$plugin_page}',
        'norm_name' => 'load-{$var}',
        'prefix' => 'load-',
        'suffix' => '',
    ],
    '31.' => [
        'name' => 'login_form_{$action}',
        'norm_name' => 'login_form_{$var}',
        'prefix' => 'login_form_',
        'suffix' => '',
    ],
    '32.' => [
        'name' => 'manage_{$this->screen->id}_custom_column',
        'norm_name' => 'manage_{$var}_custom_column',
        'prefix' => 'manage_',
        'suffix' => '_custom_column',
    ],
    '33.' => [
        'name' => 'manage_{$this->screen->id}_custom_column_js_template',
        'norm_name' => 'manage_{$var}_custom_column_js_template',
        'prefix' => 'manage_',
        'suffix' => '_custom_column_js_template',
    ],
    '34.' => [
        'name' => 'media_upload_{$tab}',
        'norm_name' => 'media_upload_{$var}',
        'prefix' => 'media_upload_',
        'suffix' => '',
    ],
    '35.' => [
        'name' => 'media_upload_{$type}',
        'norm_name' => 'media_upload_{$var}',
        'prefix' => 'media_upload_',
        'suffix' => '',
    ],
    '36.' => [
        'name' => 'network_admin_edit_{$action}',
        'norm_name' => 'network_admin_edit_{$var}',
        'prefix' => 'network_admin_edit_',
        'suffix' => '',
    ],
    '37.' => [
        'name' => 'post_action_{$action}',
        'norm_name' => 'post_action_{$var}',
        'prefix' => 'post_action_',
        'suffix' => '',
    ],
    '38.' => [
        'name' => 'rest_after_insert_{$this->post_type}',
        'norm_name' => 'rest_after_insert_{$var}',
        'prefix' => 'rest_after_insert_',
        'suffix' => '',
    ],
    '39.' => [
        'name' => 'rest_after_insert_{$this->taxonomy}',
        'norm_name' => 'rest_after_insert_{$var}',
        'prefix' => 'rest_after_insert_',
        'suffix' => '',
    ],
    '40.' => [
        'name' => 'rest_delete_{$this->post_type}',
        'norm_name' => 'rest_delete_{$var}',
        'prefix' => 'rest_delete_',
        'suffix' => '',
    ],
    '41.' => [
        'name' => 'rest_delete_{$this->taxonomy}',
        'norm_name' => 'rest_delete_{$var}',
        'prefix' => 'rest_delete_',
        'suffix' => '',
    ],
    '42.' => [
        'name' => 'rest_insert_{$this->post_type}',
        'norm_name' => 'rest_insert_{$var}',
        'prefix' => 'rest_insert_',
        'suffix' => '',
    ],
    '43.' => [
        'name' => 'rest_insert_{$this->taxonomy}',
        'norm_name' => 'rest_insert_{$var}',
        'prefix' => 'rest_insert_',
        'suffix' => '',
    ],
    '44.' => [
        'name' => 'uninstall_{$file}',
        'norm_name' => 'uninstall_{$var}',
        'prefix' => 'uninstall_',
        'suffix' => '',
    ],
    '45.' => [
        'name' => 'update-core-custom_{$action}',
        'norm_name' => 'update-core-custom_{$var}',
        'prefix' => 'update-core-custom_',
        'suffix' => '',
    ],
    '46.' => [
        'name' => 'update-custom_{$action}',
        'norm_name' => 'update-custom_{$var}',
        'prefix' => 'update-custom_',
        'suffix' => '',
    ],
    '47.' => [
        'name' => 'update_{$meta_type}_meta',
        'norm_name' => 'update_{$var}_meta',
        'prefix' => 'update_',
        'suffix' => '_meta',
    ],
    '48.' => [
        'name' => 'updated_{$meta_type}_meta',
        'norm_name' => 'updated_{$var}_meta',
        'prefix' => 'updated_',
        'suffix' => '_meta',
    ],
    '49.' => [
        'name' => 'wp_ajax_nopriv_{$action}',
        'norm_name' => 'wp_ajax_nopriv_{$var}',
        'prefix' => 'wp_ajax_nopriv_',
        'suffix' => '',
    ],
    '50.' => [
        'name' => 'wp_ajax_{$action}',
        'norm_name' => 'wp_ajax_{$var}',
        'prefix' => 'wp_ajax_',
        'suffix' => '',
    ],
    '51.' => [
        'name' => '{$taxonomy}_add_form',
        'norm_name' => '{$var}_add_form',
        'prefix' => '',
        'suffix' => '_add_form',
    ],
    '52.' => [
        'name' => '{$taxonomy}_add_form_fields',
        'norm_name' => '{$var}_add_form_fields',
        'prefix' => '',
        'suffix' => '_add_form_fields',
    ],
    '53.' => [
        'name' => '{$taxonomy}_edit_form',
        'norm_name' => '{$var}_edit_form',
        'prefix' => '',
        'suffix' => '_edit_form',
    ],
    '54.' => [
        'name' => '{$taxonomy}_edit_form_fields',
        'norm_name' => '{$var}_edit_form_fields',
        'prefix' => '',
        'suffix' => '_edit_form_fields',
    ],
    '55.' => [
        'name' => '{$taxonomy}_pre_add_form',
        'norm_name' => '{$var}_pre_add_form',
        'prefix' => '',
        'suffix' => '_pre_add_form',
    ],
    '56.' => [
        'name' => '{$taxonomy}_pre_edit_form',
        'norm_name' => '{$var}_pre_edit_form',
        'prefix' => '',
        'suffix' => '_pre_edit_form',
    ],
    '57.' => [
        'name' => '{$taxonomy}_term_edit_form_tag',
        'norm_name' => '{$var}_term_edit_form_tag',
        'prefix' => '',
        'suffix' => '_term_edit_form_tag',
    ],
    '58.' => [
        'name' => '{$taxonomy}_term_edit_form_top',
        'norm_name' => '{$var}_term_edit_form_top',
        'prefix' => '',
        'suffix' => '_term_edit_form_top',
    ],
    '59.' => [
        'name' => '{$taxonomy}_term_new_form_tag',
        'norm_name' => '{$var}_term_new_form_tag',
        'prefix' => '',
        'suffix' => '_term_new_form_tag',
    ],
];
