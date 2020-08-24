<?php
include 'includes/cons.php';

/*
 * foreach($_POST as $key => $value){
 * print "parameter key ".$key." value ".$value."<br>";
 * }
 */

if (isset($_GET['id']) && strlen($_GET['id']) != 0) {
    include 'funcs/order/order.php';
    session_start();
    show_ATC();
} else if (isset($_GET['order_id']) && strlen($_GET['order_id']) != 0) {
    include 'funcs/common/utils.php';
    
    //view order
    include 'funcs/order/confirmedOrder.php';
} else if (isset($_POST['product_id']) && strlen($_POST['product_id']) != 0) {
    include 'funcs/order/order.php';
    session_start();
    add_to_session();
    header('Location: /aamico/');
} else if (isset($_POST['action']) && $_POST['action'] == "confirm_order") {
    // insert into database
    include 'funcs/order/order.php';
    session_start();
    $order_id = confirm_order();
    unset($_SESSION["orderItemList"]);
    header('Location: /aamico/atc.php?order_id=' . $order_id);
} else {
    include 'funcs/common/utils.php';
    include 'funcs/order/checkout.php';
}
?>