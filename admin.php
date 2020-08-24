<?php
include 'includes/cons.php';


  /* foreach($_POST as $key => $value){
     print "parameter key ".$key." value ".$value."<br>";
  } */

if (isset($_POST['action']) && "verifyUser" == $_POST['action']) {
    include 'funcs/common/utils.php';
    verifyUser();
}else if (isset($_POST['action']) && "updateOrderStatus" == $_POST['action']) {
    include 'funcs/common/utils.php';
    $id = $_POST['id'];
    $newValue = $_POST['status'];
    executeSQL("update `order` set status = ".cheSNull($newValue)." where id = ".cheNull($id));
    $orderStatus=getSingleValue("select status from `order` where id = ".$id);
    echo getOrderStatusValue($orderStatus);
}else if (isset($_GET['action']) && "ordersShort" == $_GET['action']) {
    include_once 'web/body/admin/mainTable/ordersShort.php';
}else if (isset($_POST['action']) && "updateAsPaid" == $_POST['action']) {
    include 'funcs/common/utils.php';
    $id = $_POST['id'];
    executeSQL("update `order` set paymentStatus = 'Paid' where id = ".cheNull($id));
    $orderStatus=getSingleValue("select status from `order` where id = ".$id);
    echo getOrderStatusValue($orderStatus);
}else if (! isset($_SESSION['user'])) {
    include_once 'web/body/admin/login/login.php';
    displayLoginPage('');    
} else if (isset($_GET['order_id'])) {
    $orderId=$_GET['order_id'];
    include_once 'funcs/order/singleOrder.php';
    include_once 'funcs/common/utils.php';
    if(is_numeric($orderId)){
        singleOrder($orderId);
    }
}else if (isset($_GET['logoff'])) {
    // Delete certain session
    unset($_SESSION['user']);
    // Delete all session variables
    // session_destroy();
    session_destroy();
    // Jump to login page
    include_once 'web/body/admin/login/login.php';
    displayLoginPage('');
}else{
    include_once 'web/body/admin/mainTable/main.php';
}
?>