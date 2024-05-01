<?php

$woocommerce_variable_actions = [
    '0.' => [
        'name' => 'add_meta_boxes_{$this->screen_id}',
        'prefix' => 'add_meta_boxes_',
        'suffix' => '',
    ],
    '1.' => [
        'name' => 'added_{$this->object_type}_meta',
        'prefix' => 'added_',
        'suffix' => '_meta',
    ],
    '2.' => [
        'name' => 'deleted_{$this->object_type}_meta',
        'prefix' => 'deleted_',
        'suffix' => '_meta',
    ],
    '3.' => [
        'name' => 'updated_{$this->object_type}_meta',
        'prefix' => 'updated_',
        'suffix' => '_meta',
    ],
    '4.' => [
        'name' => 'wc_ajax_{$action}',
        'prefix' => 'wc_ajax_',
        'suffix' => '',
    ],
    '5.' => [
        'name' => 'woocommerce_account_downloads_column_{$column_id}',
        'prefix' => 'woocommerce_account_downloads_column_',
        'suffix' => '',
    ],
    '6.' => [
        'name' => 'woocommerce_account_payment_methods_column_{$column_id}',
        'prefix' => 'woocommerce_account_payment_methods_column_',
        'suffix' => '',
    ],
    '7.' => [
        'name' => 'woocommerce_account_{$key}_endpoint',
        'prefix' => 'woocommerce_account_',
        'suffix' => '_endpoint',
    ],
    '8.' => [
        'name' => 'woocommerce_add_to_cart_handler_{$add_to_cart_handler}',
        'prefix' => 'woocommerce_add_to_cart_handler_',
        'suffix' => '',
    ],
    '9.' => [
        'name' => 'woocommerce_admin_field_{$value[\'type\']}',
        'prefix' => 'woocommerce_admin_field_',
        'suffix' => '',
    ],
    '10.' => [
        'name' => 'woocommerce_admin_status_content_{$current_tab}',
        'prefix' => 'woocommerce_admin_status_content_',
        'suffix' => '',
    ],
    '11.' => [
        'name' => 'woocommerce_after_edit_address_form_{$load_address}',
        'prefix' => 'woocommerce_after_edit_address_form_',
        'suffix' => '',
    ],
    '12.' => [
        'name' => 'woocommerce_after_settings_{$current_tab}',
        'prefix' => 'woocommerce_after_settings_',
        'suffix' => '',
    ],
    '13.' => [
        'name' => 'woocommerce_after_{$this->object_type}_object_save',
        'prefix' => 'woocommerce_after_',
        'suffix' => '_object_save',
    ],
    '14.' => [
        'name' => 'woocommerce_api_process_product_meta_{$product->get_type()}',
        'prefix' => 'woocommerce_api_process_product_meta_',
        'suffix' => '',
    ],
    '15.' => [
        'name' => 'woocommerce_api_{$api_request}',
        'prefix' => 'woocommerce_api_',
        'suffix' => '',
    ],
    '16.' => [
        'name' => 'woocommerce_before_delete_{$post_type}',
        'prefix' => 'woocommerce_before_delete_',
        'suffix' => '',
    ],
    '17.' => [
        'name' => 'woocommerce_before_edit_address_form_{$load_address}',
        'prefix' => 'woocommerce_before_edit_address_form_',
        'suffix' => '',
    ],
    '18.' => [
        'name' => 'woocommerce_before_order_item_{$item->get_type()}_html',
        'prefix' => 'woocommerce_before_order_item_',
        'suffix' => '_html',
    ],
    '19.' => [
        'name' => 'woocommerce_before_settings_{$current_tab}',
        'prefix' => 'woocommerce_before_settings_',
        'suffix' => '',
    ],
    '20.' => [
        'name' => 'woocommerce_before_{$this->object_type}_object_save',
        'prefix' => 'woocommerce_before_',
        'suffix' => '_object_save',
    ],
    '21.' => [
        'name' => 'woocommerce_blocks_{$this->registry_identifier}_registration',
        'prefix' => 'woocommerce_blocks_',
        'suffix' => '_registration',
    ],
    '22.' => [
        'name' => 'woocommerce_delete_{$post_type}',
        'prefix' => 'woocommerce_delete_',
        'suffix' => '',
    ],
    '23.' => [
        'name' => 'woocommerce_download_file_{$file_download_method}',
        'prefix' => 'woocommerce_download_file_',
        'suffix' => '',
    ],
    '24.' => [
        'name' => 'woocommerce_email_downloads_column_{$column_id}',
        'prefix' => 'woocommerce_email_downloads_column_',
        'suffix' => '',
    ],
    '25.' => [
        'name' => 'woocommerce_email_setting_column_{$key}',
        'prefix' => 'woocommerce_email_setting_column_',
        'suffix' => '',
    ],
    '26.' => [
        'name' => 'woocommerce_grouped_product_list_after_{$column_id}',
        'prefix' => 'woocommerce_grouped_product_list_after_',
        'suffix' => '',
    ],
    '27.' => [
        'name' => 'woocommerce_grouped_product_list_before_{$column_id}',
        'prefix' => 'woocommerce_grouped_product_list_before_',
        'suffix' => '',
    ],
    '28.' => [
        'name' => 'woocommerce_my_account_my_orders_column_{$column_id}',
        'prefix' => 'woocommerce_my_account_my_orders_column_',
        'suffix' => '',
    ],
    '29.' => [
        'name' => 'woocommerce_note_action_{$triggered_action->name}',
        'prefix' => 'woocommerce_note_action_',
        'suffix' => '',
    ],
    '30.' => [
        'name' => 'woocommerce_order_item_{$item->get_type()}_html',
        'prefix' => 'woocommerce_order_item_',
        'suffix' => '_html',
    ],
    '31.' => [
        'name' => 'woocommerce_order_status_{$status_transition[\'from\']}_to_',
        'prefix' => 'woocommerce_order_status_',
        'suffix' => '_to_',
    ],
    '32.' => [
        'name' => 'woocommerce_order_status_{$status_transition[\'to\']}',
        'prefix' => 'woocommerce_order_status_',
        'suffix' => '',
    ],
    '33.' => [
        'name' => 'woocommerce_payment_complete_order_status_{$this->get_status()}',
        'prefix' => 'woocommerce_payment_complete_order_status_',
        'suffix' => '',
    ],
    '34.' => [
        'name' => 'woocommerce_payment_gateways_setting_column_{$key}',
        'prefix' => 'woocommerce_payment_gateways_setting_column_',
        'suffix' => '',
    ],
    '35.' => [
        'name' => 'woocommerce_receipt_{$order->get_payment_method()}',
        'prefix' => 'woocommerce_receipt_',
        'suffix' => '',
    ],
    '36.' => [
        'name' => 'woocommerce_rest_delete_{$taxonomy}',
        'prefix' => 'woocommerce_rest_delete_',
        'suffix' => '',
    ],
    '37.' => [
        'name' => 'woocommerce_rest_delete_{$this->post_type}',
        'prefix' => 'woocommerce_rest_delete_',
        'suffix' => '',
    ],
    '38.' => [
        'name' => 'woocommerce_rest_delete_{$this->post_type}_object',
        'prefix' => 'woocommerce_rest_delete_',
        'suffix' => '_object',
    ],
    '39.' => [
        'name' => 'woocommerce_rest_insert_{$taxonomy}',
        'prefix' => 'woocommerce_rest_insert_',
        'suffix' => '',
    ],
    '40.' => [
        'name' => 'woocommerce_rest_insert_{$this->post_type}',
        'prefix' => 'woocommerce_rest_insert_',
        'suffix' => '',
    ],
    '41.' => [
        'name' => 'woocommerce_rest_insert_{$this->post_type}_object',
        'prefix' => 'woocommerce_rest_insert_',
        'suffix' => '_object',
    ],
    '42.' => [
        'name' => 'woocommerce_sections_{$current_tab}',
        'prefix' => 'woocommerce_sections_',
        'suffix' => '',
    ],
    '43.' => [
        'name' => 'woocommerce_settings_save_{$current_tab}',
        'prefix' => 'woocommerce_settings_save_',
        'suffix' => '',
    ],
    '44.' => [
        'name' => 'woocommerce_settings_tabs_{$current_tab}',
        'prefix' => 'woocommerce_settings_tabs_',
        'suffix' => '',
    ],
    '45.' => [
        'name' => 'woocommerce_settings_{$current_tab}',
        'prefix' => 'woocommerce_settings_',
        'suffix' => '',
    ],
    '46.' => [
        'name' => 'woocommerce_shipping_classes_column_{$class}',
        'prefix' => 'woocommerce_shipping_classes_column_',
        'suffix' => '',
    ],
    '47.' => [
        'name' => 'woocommerce_shortcode_after_{$this->type}_loop',
        'prefix' => 'woocommerce_shortcode_after_',
        'suffix' => '_loop',
    ],
    '48.' => [
        'name' => 'woocommerce_shortcode_before_{$this->type}_loop',
        'prefix' => 'woocommerce_shortcode_before_',
        'suffix' => '_loop',
    ],
    '49.' => [
        'name' => 'woocommerce_shortcode_{$this->type}_loop_no_results',
        'prefix' => 'woocommerce_shortcode_',
        'suffix' => '_loop_no_results',
    ],
    '50.' => [
        'name' => 'woocommerce_thankyou_{$order->get_payment_method()}',
        'prefix' => 'woocommerce_thankyou_',
        'suffix' => '',
    ],
    '51.' => [
        'name' => 'woocommerce_trash_{$post_type}',
        'prefix' => 'woocommerce_trash_',
        'suffix' => '',
    ],
    '52.' => [
        'name' => 'woocommerce_update_options_payment_gateways_{$gateway->id}',
        'prefix' => 'woocommerce_update_options_payment_gateways_',
        'suffix' => '',
    ],
    '53.' => [
        'name' => 'woocommerce_update_options_{$current_tab}',
        'prefix' => 'woocommerce_update_options_',
        'suffix' => '',
    ],
    '54.' => [
        'name' => 'woocommerce_update_options_{$this->id}_',
        'prefix' => 'woocommerce_update_options_',
        'suffix' => '_',
    ],
    '55.' => [
        'name' => 'woocommerce_widget_field_{$setting[\'type\']}',
        'prefix' => 'woocommerce_widget_field_',
        'suffix' => '',
    ],
    '56.' => [
        'name' => 'woocommerce_{$product->get_type()}_add_to_cart',
        'prefix' => 'woocommerce_',
        'suffix' => '_add_to_cart',
    ],
    '57.' => [
        'name' => 'woocommerce_{$this->id}_shipping_add_rate',
        'prefix' => 'woocommerce_',
        'suffix' => '_shipping_add_rate',
    ],
    '58.' => [
        'name' => 'wp_{$blog_id}_wc_updater_cron',
        'prefix' => 'wp_',
        'suffix' => '_wc_updater_cron',
    ],
    '59.' => [
        'name' => '{$filter}_notification',
        'prefix' => '',
        'suffix' => '_notification',
    ],
    '60.' => [
        'name' => '{$value[\'id\'])}_after',
        'prefix' => '',
        'suffix' => '_after',
    ],
    '61.' => [
        'name' => '{$value[\'id\'])}_end',
        'prefix' => '',
        'suffix' => '_end',
    ],
];
