<?php

// 98 actions.
$wp_variable_actions = [
    [
        'name' => 'activate_{$plugin}',
        'prefix' => 'activate_',
        'suffix' => '',
    ],
    [
        'name' => 'add_meta_boxes_{$post_type}',
        'prefix' => 'add_meta_boxes_',
        'suffix' => '',
    ],
    [
        'name' => 'add_option_{$option}',
        'prefix' => 'add_option_',
        'suffix' => '',
    ],
    [
        'name' => 'add_site_option_{$option}',
        'prefix' => 'add_site_option_',
        'suffix' => '',
    ],
    [
        'name' => 'add_{$meta_type}_meta',
        'prefix' => 'add_',
        'suffix' => '_meta',
    ],
    [
        'name' => 'added_{$meta_type}_meta',
        'prefix' => 'added_',
        'suffix' => '_meta',
    ],
    [
        'name' => 'admin_action_{$action}',
        'prefix' => 'admin_action_',
        'suffix' => '',
    ],
    [
        'name' => 'admin_footer-{$hook_suffix}',
        'prefix' => 'admin_footer-',
        'suffix' => '',
    ],
    [
        'name' => 'admin_head-{$hook_suffix}',
        'prefix' => 'admin_head-',
        'suffix' => '',
    ],
    [
        'name' => 'admin_head_{$content_func}',
        'prefix' => 'admin_head_',
        'suffix' => '',
    ],
    [
        'name' => 'admin_post_nopriv_{$action}',
        'prefix' => 'admin_post_nopriv_',
        'suffix' => '',
    ],
    [
        'name' => 'admin_post_{$action}',
        'prefix' => 'admin_post_',
        'suffix' => '',
    ],
    [
        'name' => 'admin_print_footer_scripts-{$hook_suffix}',
        'prefix' => 'admin_print_footer_scripts-',
        'suffix' => '',
    ],
    [
        'name' => 'admin_print_scripts-{$hook_suffix}',
        'prefix' => 'admin_print_scripts-',
        'suffix' => '',
    ],
    [
        'name' => 'admin_print_styles-{$hook_suffix}',
        'prefix' => 'admin_print_styles-',
        'suffix' => '',
    ],
    [
        'name' => 'after-{$taxonomy}-table',
        'prefix' => 'after-',
        'suffix' => '-table',
    ],
    [
        'name' => 'after_plugin_row_{$plugin_file}',
        'prefix' => 'after_plugin_row_',
        'suffix' => '',
    ],
    [
        'name' => 'after_theme_row_{$stylesheet}',
        'prefix' => 'after_theme_row_',
        'suffix' => '',
    ],
    [
        'name' => 'comment_{$new_status}_{$comment->comment_type}',
        'prefix' => 'comment_',
        'suffix' => '',
    ],
    [
        'name' => 'comment_{$old_status}_to_{$new_status}',
        'prefix' => 'comment_',
        'suffix' => '',
    ],
    [
        'name' => 'create_{$taxonomy}',
        'prefix' => 'create_',
        'suffix' => '',
    ],
    [
        'name' => 'created_{$taxonomy}',
        'prefix' => 'created_',
        'suffix' => '',
    ],
    [
        'name' => 'customize_post_value_set_{$setting_id}',
        'prefix' => 'customize_post_value_set_',
        'suffix' => '',
    ],
    [
        'name' => 'customize_preview_{$this->id}',
        'prefix' => 'customize_preview_',
        'suffix' => '',
    ],
    [
        'name' => 'customize_preview_{$this->type}',
        'prefix' => 'customize_preview_',
        'suffix' => '',
    ],
    [
        'name' => 'customize_render_control_{$this->id}',
        'prefix' => 'customize_render_control_',
        'suffix' => '',
    ],
    [
        'name' => 'customize_render_panel_{$this->id}',
        'prefix' => 'customize_render_panel_',
        'suffix' => '',
    ],
    [
        'name' => 'customize_render_section_{$this->id}',
        'prefix' => 'customize_render_section_',
        'suffix' => '',
    ],
    [
        'name' => 'customize_save_{$id_base}',
        'prefix' => 'customize_save_',
        'suffix' => '',
    ],
    [
        'name' => 'customize_update_{$this->type}',
        'prefix' => 'customize_update_',
        'suffix' => '',
    ],
    [
        'name' => 'deactivate_{$plugin}',
        'prefix' => 'deactivate_',
        'suffix' => '',
    ],
    [
        'name' => 'delete_option_{$option}',
        'prefix' => 'delete_option_',
        'suffix' => '',
    ],
    [
        'name' => 'delete_post_{$post->post_type}',
        'prefix' => 'delete_post_',
        'suffix' => '',
    ],
    [
        'name' => 'delete_site_option_{$option}',
        'prefix' => 'delete_site_option_',
        'suffix' => '',
    ],
    [
        'name' => 'delete_site_transient_{$transient}',
        'prefix' => 'delete_site_transient_',
        'suffix' => '',
    ],
    [
        'name' => 'delete_transient_{$transient}',
        'prefix' => 'delete_transient_',
        'suffix' => '',
    ],
    [
        'name' => 'delete_{$meta_type}_meta',
        'prefix' => 'delete_',
        'suffix' => '_meta',
    ],
    [
        'name' => 'delete_{$meta_type}meta',
        'prefix' => 'delete_',
        'suffix' => 'meta',
    ],
    [
        'name' => 'delete_{$taxonomy}',
        'prefix' => 'delete_',
        'suffix' => '',
    ],
    [
        'name' => 'deleted_post_{$post->post_type}',
        'prefix' => 'deleted_post_',
        'suffix' => '',
    ],
    [
        'name' => 'deleted_{$meta_type}_meta',
        'prefix' => 'deleted_',
        'suffix' => '_meta',
    ],
    [
        'name' => 'deleted_{$meta_type}meta',
        'prefix' => 'deleted_',
        'suffix' => 'meta',
    ],
    [
        'name' => 'do_feed_{$feed}',
        'prefix' => 'do_feed_',
        'suffix' => '',
    ],
    [
        'name' => 'edit_post_{$post->post_type}',
        'prefix' => 'edit_post_',
        'suffix' => '',
    ],
    [
        'name' => 'edit_{$taxonomy}',
        'prefix' => 'edit_',
        'suffix' => '',
    ],
    [
        'name' => 'edited_{$taxonomy}',
        'prefix' => 'edited_',
        'suffix' => '',
    ],
    [
        'name' => 'get_template_part_{$slug}',
        'prefix' => 'get_template_part_',
        'suffix' => '',
    ],
    [
        'name' => 'in_plugin_update_message-{$file}',
        'prefix' => 'in_plugin_update_message-',
        'suffix' => '',
    ],
    [
        'name' => 'in_theme_update_message-{$theme_key}',
        'prefix' => 'in_theme_update_message-',
        'suffix' => '',
    ],
    [
        'name' => 'install_plugins_pre_{$tab}',
        'prefix' => 'install_plugins_pre_',
        'suffix' => '',
    ],
    [
        'name' => 'install_plugins_{$tab}',
        'prefix' => 'install_plugins_',
        'suffix' => '',
    ],
    [
        'name' => 'install_themes_pre_{$tab}',
        'prefix' => 'install_themes_pre_',
        'suffix' => '',
    ],
    [
        'name' => 'install_themes_{$tab}',
        'prefix' => 'install_themes_',
        'suffix' => '',
    ],
    [
        'name' => 'load-importer-{$importer}',
        'prefix' => 'load-importer-',
        'suffix' => '',
    ],
    [
        'name' => 'load-{$page_hook}',
        'prefix' => 'load-',
        'suffix' => '',
    ],
    [
        'name' => 'load-{$pagenow}',
        'prefix' => 'load-',
        'suffix' => '',
    ],
    [
        'name' => 'load-{$plugin_page}',
        'prefix' => 'load-',
        'suffix' => '',
    ],
    [
        'name' => 'login_form_{$action}',
        'prefix' => 'login_form_',
        'suffix' => '',
    ],
    [
        'name' => 'manage_{$post->post_type}_posts_custom_column',
        'prefix' => 'manage_',
        'suffix' => '_posts_custom_column',
    ],
    [
        'name' => 'manage_{$this->screen->id}_custom_column',
        'prefix' => 'manage_',
        'suffix' => '_custom_column',
    ],
    [
        'name' => 'manage_{$this->screen->id}_custom_column',
        'prefix' => 'manage_',
        'suffix' => '_custom_column',
    ],
    [
        'name' => 'manage_{$this->screen->id}_custom_column_js_template',
        'prefix' => 'manage_',
        'suffix' => '_custom_column_js_template',
    ],
    [
        'name' => 'media_upload_{$tab}',
        'prefix' => 'media_upload_',
        'suffix' => '',
    ],
    [
        'name' => 'media_upload_{$type}',
        'prefix' => 'media_upload_',
        'suffix' => '',
    ],
    [
        'name' => 'network_admin_edit_{$action}',
        'prefix' => 'network_admin_edit_',
        'suffix' => '',
    ],
    [
        'name' => 'post_action_{$action}',
        'prefix' => 'post_action_',
        'suffix' => '',
    ],
    [
        'name' => 'pre_delete_site_option_{$option}',
        'prefix' => 'pre_delete_site_option_',
        'suffix' => '',
    ],
    [
        'name' => 'registered_post_type_{$post_type}',
        'prefix' => 'registered_post_type_',
        'suffix' => '',
    ],
    [
        'name' => 'registered_taxonomy_{$taxonomy}',
        'prefix' => 'registered_taxonomy_',
        'suffix' => '',
    ],
    [
        'name' => 'requests-{$hook}',
        'prefix' => 'requests-',
        'suffix' => '',
    ],
    [
        'name' => 'rest_after_insert_{$this->post_type}',
        'prefix' => 'rest_after_insert_',
        'suffix' => '',
    ],
    [
        'name' => 'rest_after_insert_{$this->taxonomy}',
        'prefix' => 'rest_after_insert_',
        'suffix' => '',
    ],
    [
        'name' => 'rest_delete_{$this->post_type}',
        'prefix' => 'rest_delete_',
        'suffix' => '',
    ],
    [
        'name' => 'rest_delete_{$this->taxonomy}',
        'prefix' => 'rest_delete_',
        'suffix' => '',
    ],
    [
        'name' => 'rest_insert_{$this->post_type}',
        'prefix' => 'rest_insert_',
        'suffix' => '',
    ],
    [
        'name' => 'rest_insert_{$this->taxonomy}',
        'prefix' => 'rest_insert_',
        'suffix' => '',
    ],
    [
        'name' => 'save_post_{$post->post_type}',
        'prefix' => 'save_post_',
        'suffix' => '',
    ],
    [
        'name' => 'saved_{$taxonomy}',
        'prefix' => 'saved_',
        'suffix' => '',
    ],
    [
        'name' => 'set_site_transient_{$transient}',
        'prefix' => 'set_site_transient_',
        'suffix' => '',
    ],
    [
        'name' => 'set_transient_{$transient}',
        'prefix' => 'set_transient_',
        'suffix' => '',
    ],
    [
        'name' => 'uninstall_{$file}',
        'prefix' => 'uninstall_',
        'suffix' => '',
    ],
    [
        'name' => 'update-core-custom_{$action}',
        'prefix' => 'update-core-custom_',
        'suffix' => '',
    ],
    [
        'name' => 'update-custom_{$action}',
        'prefix' => 'update-custom_',
        'suffix' => '',
    ],
    [
        'name' => 'update_option_{$option}',
        'prefix' => 'update_option_',
        'suffix' => '',
    ],
    [
        'name' => 'update_site_option_{$option}',
        'prefix' => 'update_site_option_',
        'suffix' => '',
    ],
    [
        'name' => 'update_{$meta_type}_meta',
        'prefix' => 'update_',
        'suffix' => '_meta',
    ],
    [
        'name' => 'updated_{$meta_type}_meta',
        'prefix' => 'updated_',
        'suffix' => '_meta',
    ],
    [
        'name' => 'wp_ajax_nopriv_{$action}',
        'prefix' => 'wp_ajax_nopriv_',
        'suffix' => '',
    ],
    [
        'name' => 'wp_ajax_{$action}',
        'prefix' => 'wp_ajax_',
        'suffix' => '',
    ],
    [
        'name' => '{$taxonomy}_add_form',
        'prefix' => '',
        'suffix' => '_add_form',
    ],
    [
        'name' => '{$taxonomy}_add_form_fields',
        'prefix' => '',
        'suffix' => '_add_form_fields',
    ],
    [
        'name' => '{$taxonomy}_edit_form',
        'prefix' => '',
        'suffix' => '_edit_form',
    ],
    [
        'name' => '{$taxonomy}_edit_form_fields',
        'prefix' => '',
        'suffix' => '_edit_form_fields',
    ],
    [
        'name' => '{$taxonomy}_pre_add_form',
        'prefix' => '',
        'suffix' => '_pre_add_form',
    ],
    [
        'name' => '{$taxonomy}_pre_edit_form',
        'prefix' => '',
        'suffix' => '_pre_edit_form',
    ],
    [
        'name' => '{$taxonomy}_term_edit_form_tag',
        'prefix' => '',
        'suffix' => '_term_edit_form_tag',
    ],
    [
        'name' => '{$taxonomy}_term_edit_form_top',
        'prefix' => '',
        'suffix' => '_term_edit_form_top',
    ],
    [
        'name' => '{$taxonomy}_term_new_form_tag',
        'prefix' => '',
        'suffix' => '_term_new_form_tag',
    ],
];
