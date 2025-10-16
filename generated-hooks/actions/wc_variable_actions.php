<?php

// 91 actions.
$wc_variable_actions = [
    [
        'name' => 'added_{$this->object_type}_meta',
        'prefix' => 'added_',
        'suffix' => '_meta',
    ],
    [
        'name' => 'deleted_{$this->object_type}_meta',
        'prefix' => 'deleted_',
        'suffix' => '_meta',
    ],
    [
        'name' => 'manage_{$this->screen->id}_custom_column',
        'prefix' => 'manage_',
        'suffix' => '_custom_column',
    ],
    [
        'name' => 'updated_{$this->object_type}_meta',
        'prefix' => 'updated_',
        'suffix' => '_meta',
    ],
    [
        'name' => 'woocommerce_after_edit_address_form_{$load_address}',
        'prefix' => 'woocommerce_after_edit_address_form_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_before_edit_address_form_{$load_address}',
        'prefix' => 'woocommerce_before_edit_address_form_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_block_template_area_{$this->get_root_template()->get_area()}_after_add_block_{$block->get_id()}',
        'prefix' => 'woocommerce_block_template_area_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_block_template_area_{$this->get_root_template()->get_area()}_after_remove_block_{$block->get_id()}',
        'prefix' => 'woocommerce_block_template_area_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_rest_delete_{$taxonomy}',
        'prefix' => 'woocommerce_rest_delete_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_rest_delete_{$this->post_type}',
        'prefix' => 'woocommerce_rest_delete_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_rest_delete_{$this->post_type}',
        'prefix' => 'woocommerce_rest_delete_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_rest_delete_{$this->post_type}_object',
        'prefix' => 'woocommerce_rest_delete_',
        'suffix' => '_object',
    ],
    [
        'name' => 'woocommerce_rest_delete_{$this->post_type}_object',
        'prefix' => 'woocommerce_rest_delete_',
        'suffix' => '_object',
    ],
    [
        'name' => 'woocommerce_rest_delete_{$this->post_type}_object',
        'prefix' => 'woocommerce_rest_delete_',
        'suffix' => '_object',
    ],
    [
        'name' => 'woocommerce_rest_insert_{$taxonomy}',
        'prefix' => 'woocommerce_rest_insert_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_rest_insert_{$taxonomy}',
        'prefix' => 'woocommerce_rest_insert_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_rest_insert_{$this->post_type}',
        'prefix' => 'woocommerce_rest_insert_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_rest_insert_{$this->post_type}',
        'prefix' => 'woocommerce_rest_insert_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_rest_insert_{$this->post_type}',
        'prefix' => 'woocommerce_rest_insert_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_rest_insert_{$this->post_type}',
        'prefix' => 'woocommerce_rest_insert_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_rest_insert_{$this->post_type}',
        'prefix' => 'woocommerce_rest_insert_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_rest_insert_{$this->post_type}',
        'prefix' => 'woocommerce_rest_insert_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_rest_insert_{$this->post_type}',
        'prefix' => 'woocommerce_rest_insert_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_rest_insert_{$this->post_type}_object',
        'prefix' => 'woocommerce_rest_insert_',
        'suffix' => '_object',
    ],
    [
        'name' => 'woocommerce_rest_insert_{$this->post_type}_object',
        'prefix' => 'woocommerce_rest_insert_',
        'suffix' => '_object',
    ],
    [
        'name' => 'woocommerce_shortcode_after_{$this->type}_loop',
        'prefix' => 'woocommerce_shortcode_after_',
        'suffix' => '_loop',
    ],
    [
        'name' => 'woocommerce_shortcode_before_{$this->type}_loop',
        'prefix' => 'woocommerce_shortcode_before_',
        'suffix' => '_loop',
    ],
    [
        'name' => 'woocommerce_shortcode_{$this->type}_loop_no_results',
        'prefix' => 'woocommerce_shortcode_',
        'suffix' => '_loop_no_results',
    ],
    [
        'name' => 'add_meta_boxes_{$this->screen_id}',
        'prefix' => 'add_meta_boxes_',
        'suffix' => '',
    ],
    [
        'name' => 'wc_ajax_{$action}',
        'prefix' => 'wc_ajax_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_{$product->get_type()}_add_to_cart',
        'prefix' => 'woocommerce_',
        'suffix' => '_add_to_cart',
    ],
    [
        'name' => 'woocommerce_{$product->get_type()}_add_to_cart',
        'prefix' => 'woocommerce_',
        'suffix' => '_add_to_cart',
    ],
    [
        'name' => 'woocommerce_{$product->get_type()}_add_to_cart',
        'prefix' => 'woocommerce_',
        'suffix' => '_add_to_cart',
    ],
    [
        'name' => 'woocommerce_{$product->get_type()}_add_to_cart',
        'prefix' => 'woocommerce_',
        'suffix' => '_add_to_cart',
    ],
    [
        'name' => 'woocommerce_{$this->id}_shipping_add_rate',
        'prefix' => 'woocommerce_',
        'suffix' => '_shipping_add_rate',
    ],
    [
        'name' => 'woocommerce_{$this->order_type}_list_table_custom_column',
        'prefix' => 'woocommerce_',
        'suffix' => '_list_table_custom_column',
    ],
    [
        'name' => 'woocommerce_account_{$key}_endpoint',
        'prefix' => 'woocommerce_account_',
        'suffix' => '_endpoint',
    ],
    [
        'name' => 'woocommerce_account_downloads_column_{$column_id}',
        'prefix' => 'woocommerce_account_downloads_column_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_account_payment_methods_column_{$column_id}',
        'prefix' => 'woocommerce_account_payment_methods_column_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_add_to_cart_handler_{$add_to_cart_handler}',
        'prefix' => 'woocommerce_add_to_cart_handler_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_admin_field_{$value[\'type\']}',
        'prefix' => 'woocommerce_admin_field_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_admin_status_content_{$current_tab}',
        'prefix' => 'woocommerce_admin_status_content_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_after_{$this->object_type}_object_save',
        'prefix' => 'woocommerce_after_',
        'suffix' => '_object_save',
    ],
    [
        'name' => 'woocommerce_after_{$this->object_type}_object_save',
        'prefix' => 'woocommerce_after_',
        'suffix' => '_object_save',
    ],
    [
        'name' => 'woocommerce_after_{$this->object_type}_object_save',
        'prefix' => 'woocommerce_after_',
        'suffix' => '_object_save',
    ],
    [
        'name' => 'woocommerce_after_{$this->object_type}_object_save',
        'prefix' => 'woocommerce_after_',
        'suffix' => '_object_save',
    ],
    [
        'name' => 'woocommerce_after_settings_{$current_tab}',
        'prefix' => 'woocommerce_after_settings_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_api_{$api_request}',
        'prefix' => 'woocommerce_api_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_before_{$this->object_type}_object_save',
        'prefix' => 'woocommerce_before_',
        'suffix' => '_object_save',
    ],
    [
        'name' => 'woocommerce_before_{$this->object_type}_object_save',
        'prefix' => 'woocommerce_before_',
        'suffix' => '_object_save',
    ],
    [
        'name' => 'woocommerce_before_{$this->object_type}_object_save',
        'prefix' => 'woocommerce_before_',
        'suffix' => '_object_save',
    ],
    [
        'name' => 'woocommerce_before_{$this->object_type}_object_save',
        'prefix' => 'woocommerce_before_',
        'suffix' => '_object_save',
    ],
    [
        'name' => 'woocommerce_before_delete_{$post_type}',
        'prefix' => 'woocommerce_before_delete_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_before_order_item_{$item->get_type()}_html',
        'prefix' => 'woocommerce_before_order_item_',
        'suffix' => '_html',
    ],
    [
        'name' => 'woocommerce_before_settings_{$current_tab}',
        'prefix' => 'woocommerce_before_settings_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_blocks_{$this->registry_identifier}_registration',
        'prefix' => 'woocommerce_blocks_',
        'suffix' => '_registration',
    ],
    [
        'name' => 'woocommerce_blocks_validate_location_{$location}_fields',
        'prefix' => 'woocommerce_blocks_validate_location_',
        'suffix' => '_fields',
    ],
    [
        'name' => 'woocommerce_delete_{$post_type}',
        'prefix' => 'woocommerce_delete_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_download_file_{$file_download_method}',
        'prefix' => 'woocommerce_download_file_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_email_downloads_column_{$column_id}',
        'prefix' => 'woocommerce_email_downloads_column_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_email_downloads_column_{$column_id}',
        'prefix' => 'woocommerce_email_downloads_column_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_email_setting_column_{$key}',
        'prefix' => 'woocommerce_email_setting_column_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_grouped_product_list_after_{$column_id}',
        'prefix' => 'woocommerce_grouped_product_list_after_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_grouped_product_list_before_{$column_id}',
        'prefix' => 'woocommerce_grouped_product_list_before_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_hide_{$name}_notice',
        'prefix' => 'woocommerce_hide_',
        'suffix' => '_notice',
    ],
    [
        'name' => 'woocommerce_my_account_my_orders_column_{$column_id}',
        'prefix' => 'woocommerce_my_account_my_orders_column_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_my_account_my_orders_column_{$column_id}',
        'prefix' => 'woocommerce_my_account_my_orders_column_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_note_action_{$triggered_action->name}',
        'prefix' => 'woocommerce_note_action_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_order_item_{$item->get_type()}_html',
        'prefix' => 'woocommerce_order_item_',
        'suffix' => '_html',
    ],
    [
        'name' => 'woocommerce_order_status_{$status_transition[\'from\']}_to_',
        'prefix' => 'woocommerce_order_status_',
        'suffix' => '_to_',
    ],
    [
        'name' => 'woocommerce_order_status_{$status_transition[\'to\']}',
        'prefix' => 'woocommerce_order_status_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_payment_complete_order_status_{$this->get_status()}',
        'prefix' => 'woocommerce_payment_complete_order_status_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_process_{$post->post_type}_meta',
        'prefix' => 'woocommerce_process_',
        'suffix' => '_meta',
    ],
    [
        'name' => 'woocommerce_process_product_meta_{$product_type}',
        'prefix' => 'woocommerce_process_product_meta_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_product_reviews_table_column_{$column_name}',
        'prefix' => 'woocommerce_product_reviews_table_column_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_receipt_{$order->get_payment_method()}',
        'prefix' => 'woocommerce_receipt_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_sections_{$current_tab}',
        'prefix' => 'woocommerce_sections_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_settings_{$current_tab}',
        'prefix' => 'woocommerce_settings_',
        'suffix' => '',
    ],
    [
        'name' => '{$value[\'id\'])}_after',
        'prefix' => '',
        'suffix' => '_after',
    ],
    [
        'name' => '{$value[\'id\'])}_end',
        'prefix' => '',
        'suffix' => '_end',
    ],
    [
        'name' => 'woocommerce_settings_save_{$current_tab}',
        'prefix' => 'woocommerce_settings_save_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_settings_tabs_{$current_tab}',
        'prefix' => 'woocommerce_settings_tabs_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_shipping_classes_column_{$class}',
        'prefix' => 'woocommerce_shipping_classes_column_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_shipping_classes_column_{$class}',
        'prefix' => 'woocommerce_shipping_classes_column_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_thankyou_{$order->get_payment_method()}',
        'prefix' => 'woocommerce_thankyou_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_trash_{$post_type}',
        'prefix' => 'woocommerce_trash_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_update_options_{$current_tab}',
        'prefix' => 'woocommerce_update_options_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_update_options_{$this->id}_',
        'prefix' => 'woocommerce_update_options_',
        'suffix' => '_',
    ],
    [
        'name' => 'woocommerce_update_options_payment_gateways_{$gateway->id}',
        'prefix' => 'woocommerce_update_options_payment_gateways_',
        'suffix' => '',
    ],
    [
        'name' => 'woocommerce_widget_field_{$setting[\'type\']}',
        'prefix' => 'woocommerce_widget_field_',
        'suffix' => '',
    ],
    [
        'name' => 'wp_{$blog_id}_wc_updater_cron',
        'prefix' => 'wp_',
        'suffix' => '_wc_updater_cron',
    ],
];
