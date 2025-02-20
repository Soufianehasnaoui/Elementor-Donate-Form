<?php

function handle_add_to_cart_with_custom_amount() {

    $type_product = intval($_POST['type_product']);
    $product_id = 1450;
    $user_name = sanitize_text_field($_POST['name']);
    $user_email = sanitize_text_field($_POST['email']);
    $user_telephone = sanitize_text_field($_POST['telephone']);
    $user_note = sanitize_text_field($_POST['note']);
    $user_price = intval($_POST['amount']);
    $quantity = 1;

    $cart_item_data = array(
        'user_name' => $user_name,
        'user_email'   => $user_email,
        'user_telephone' => $user_telephone,
        'user_note'   => $user_note,
        'totalprice'   => $user_price,
    );
    
    $added_item_key = WC()->cart->add_to_cart($product_id, $quantity, 0, array(), $cart_item_data);
    if (!$added_item_key) {
        wp_send_json_error(array(
            'message' => "Le produit n'a pas été ajouté au panier. Vérifiez les données saisies et réessayez.",
        ));
    } else {
        wp_send_json_success(array(
            'message' => 'Le produit a été ajouté avec succès au panier.',
        ));
    }    
}
add_action('wp_ajax_add_to_cart_with_custom_amount', 'handle_add_to_cart_with_custom_amount');
add_action('wp_ajax_nopriv_add_to_cart_with_custom_amount', 'handle_add_to_cart_with_custom_amount');