<?php
require_once('../../util/main.php');
require_once('util/secure_conn.php');
require_once('util/valid_admin.php');

require_once('model/customer_db.php');
require_once('model/address_db.php');
require_once('model/order_db.php');
require_once('model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action = 'view_orders';
    }
}

switch($action) {
    case 'view_orders':
        $new_orders = get_unfilled_orders();
        $old_orders = get_filled_orders();
        include 'orders.php';
        break;
    case 'view_order':
        $order_id = filter_input(INPUT_GET, 'order_id', FILTER_VALIDATE_INT);

        // Get order data
        $order = get_order($order_id);
        $order_date = date('M j, Y', strtotime($order['orderdate']));
        $order_items = get_order_items($order_id);

        // Get customer data
        $customer = get_customer($order['customerid']);
        $name = $customer['firstname'] . ' ' . $customer['lastname'];
        $email = $customer['emailaddress'];
        $card_number = $order['cardnumber'];
        $card_expires = $order['cardexpires'];
        $card_name = card_name($order['cardtype']);

        $shipping_address = get_address($order['shipaddressid']);
        $ship_line1 = $shipping_address['line1'];
        $ship_line2 = $shipping_address['line2'];
        $ship_city = $shipping_address['city'];
        $ship_state = $shipping_address['state'];
        $ship_zip = $shipping_address['zipcode'];
        $ship_phone = $shipping_address['phone'];

        $billing_address = get_address($order['billingaddressid']);
        $bill_line1 = $billing_address['line1'];
        $bill_line2 = $billing_address['line2'];
        $bill_city = $billing_address['city'];
        $bill_state = $billing_address['state'];
        $bill_zip = $billing_address['zipcode'];
        $bill_phone = $billing_address['phone'];

        include 'order.php';
        break;
    case 'set_ship_date':
        $order_id = filter_input(INPUT_POST, 'order_id', FILTER_VALIDATE_INT);
        set_ship_date($order_id);
        $url = '?action=view_order&order_id=' . $order_id;
        redirect($url);
    case 'confirm_delete':
        // Get order data
        $order_id = filter_input(INPUT_POST, 'order_id', FILTER_VALIDATE_INT);
        $order = get_order($order_id);
        $order_date = date('M j, Y', strtotime($order['orderdate']));

        // Get customer data
        $customer = get_customer($order['customerid']);
        $customer_name = $customer['lastname'] . ', ' . $customer['firstname'];
        $email = $customer['emailaddress'];

        include 'confirm_delete.php';
        break;
    case 'delete':
        $order_id = filter_input(INPUT_POST, 'order_id', FILTER_VALIDATE_INT);
        delete_order($order_id);
        redirect('.');
        break;
    default:
        display_error("Unknown order action: " . $action);
        break;
}
?>