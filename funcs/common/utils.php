<?php

function getExtrasString($extrasList, $extra_price, $isDB){
    $extrasString = '';
    $rowNo = 1;
    if (count($extrasList) > 0){
        $extrasString = "<ul class ='list-group'>";
        foreach ($extrasList as $row){
            $extra=null;
            if($isDB){
                $extra=getFetchArray("select * from extra where id = ".$row['extra_id'])[0];
            }else{
                $extra=getFetchArray("select * from extra where id = ".$row)[0];
            }
            
            if ($extra['unitPrice'] == 0){
                $extrasString .= "<li class='list-group-item list-group-item-light py-0'><small> ".$rowNo.".".$extra['name']." </small> </li>";
            }else{
                $extrasString .= "<li class='list-group-item list-group-item-light py-0'><small> ".$rowNo.".".$extra['name']."  ".$extra['unitPrice']."</small> </li>";
            }
            $rowNo += 1;
        }
        $extrasString .= "<li class ='list-group-item list-group-item-light py-0'><strong>Price   ".$extra_price." CHF</strong></li></ul>";
    }
    return $extrasString;
}

function verifyUser(){
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $id = getSingleValue("select id from users where username=".cheSNull($username)." and password = ".cheSNull($password));
    if(!is_null($id)){
        //print(" username ".$username." and password ".$password." and id is ".$id);
        $role = getSingleValue("select role from users where id=".$id);
        $_SESSION['uid']=$id;
        $_SESSION['user']=$username;
        $_SESSION['role']=$role;
        if($role=='guest'){
            header('Location: index.php');
        }else{
            header('Location: admin.php');
        }
    }else{
        include_once 'web/body/admin/login/login.php';
        displayLoginPage("Invalid entry");
    }
}

function getOrderStatusValue($orderStatus){
    $response = '';
    $orderStatusValues = array("New", "Progress", "Ready", "Delivered", "Cancelled");
    foreach ($orderStatusValues as $row){
        if ($row == $orderStatus){
            $response .= '<label class="btn btn-info btn-sm active"><input autocomplete="off" checked id="'. $orderStatus . '" name="status" type="radio"> ' . $orderStatus . '</label>';
        }else{
            $response .= '<label class="btn btn-outline-info btn-sm"><input autocomplete="off" id="' . $row . '" name="status" type="radio">' . $row . '</label>';
        }
    }
    return $response;
}

function mailHelper($toAddress, $subject, $content){
    ini_set("SMTP", "lx16.hoststar.hosting");
    ini_set("smtp_port", "587");
    ini_set("sendmail_from", "info@saransolutions.ch");
    
    $headers = "From: ";
    $headers = "From: " . strip_tags("info@saransolutions.ch") . "\r\n";
    $headers .= "Reply-To: ". strip_tags("info@saransolutions.ch") . "\r\n";
    //$headers .= "CC: 123sdoiuerwo1237@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
    mail($toAddress, $subject, $content, $headers);
    //echo "Check your email now....&lt;BR/>";
    
}

?>