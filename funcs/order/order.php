<?php

function checkout(){
    
    $orderItemkList = $_SESSION["orderItemList"];
    $totalNoOfProducts=count($orderItemkList);
    foreach ($orderItemkList as $orderItem){
        $productId = $orderItem['productId'];
        print("product id ".$productId);
    }    
}


function add_to_session(){
    //collect product details for each product
    $productDetails=array();
    $productId=$_POST['product_id'];
    $productDetails['productId']=$productId;
    $user_input=$_POST['user_input'];
    $productDetails['user_input']=$user_input;
    $total_options=$_POST['total_options'];
    $productDetails['total_options']=$total_options;
    $extra_price=$_POST['extra_price'];
    $productDetails['extra_price']=$extra_price;
    $no_of_items=$_POST['no_of_items'];
    $productDetails['no_of_items']=$no_of_items;
    $changed_total=$_POST['changed_total'];
    $productDetails['changed_total']=$changed_total;
    $extra=array();
    foreach($_POST as $key => $value){
        if (strpos($key, 'e_') !== false){
            $key = str_replace("e_","",$key);
            $extra[]=$key;
        }
    }
    $productDetails['extra']=$extra;
    //initialize session
    if(isset($_SESSION["orderItemList"])){
        $cart = $_SESSION["orderItemList"];
    }else{
        $cart=array();
    }
    //add into array
    array_push($cart,$productDetails);    
    $_SESSION["orderItemList"] = $cart;
}

function show_ATC(){
    $products = getFetchArray("select * from product where id=".$_GET['id']);
    if (count($products)>0){
        $product = $products[0];
        $checkboxes='';
        if (strpos($product['productType'], 'pizza') !== false){
            $checkboxes="<p style='margin:1px;padding:1px;'>
                            <a class='btn btn-warning btn-sm' style='background:#ffdb4d;color:#cc3300;border:none;' data-toggle='collapse' href='#collapseExample' role='button' aria-expanded='false' aria-controls='collapseExample'>Add Extra</a>
                         </p>
                         <div class='collapse' id='collapseExample'>
                            <div class='card card-body' style='margin:1px;padding:1px;border:1px solid #ffdb4d;'>
                            <table class='mainTablePizzaList table-sm' style='margin:1px;padding:1px;background:#ffcc00;color:#cc3300;border:none;font-size:14px;' ><tbody>";
            $extras = getFetchArray("select * from extra order by seqNo");
            
            $i = 0;
            for ($i = 0; $i < count($extras);) {
                $str1 = '';
                $str2 = '';
                $str3 = '';
                if ($extras[$i]['unitPrice']>1.0){$str1=$extras[$i]['unitPrice'];}
                if ($extras[($i+1)]['unitPrice']>1.0){$str2=$extras[($i+1)]['unitPrice'];}
                if ($extras[($i+2)]['unitPrice']>1.0){$str3=$extras[($i+2)]['unitPrice'];}
                $checkboxes .= "<tr>";
                if($extras[$i]!=null){
                    $checkboxes .= "<td><input name='e_".$extras[$i]['id']."' value='".$extras[$i]['unitPrice']."' type='checkbox' style='background:#ffcc00;color:#cc3300;border:1px solid #e68a00;'> ".$extras[$i]['name']." ".$str1."</td>";
                }
                if($extras[$i+1]!=null){
                    $checkboxes .= "<td><input name='e_".$extras[$i+1]['id']."' value='".$extras[$i+1]['unitPrice']."' type='checkbox' style='background:#ffcc00;color:#cc3300;border:1px solid #e68a00;'> ".$extras[$i+1]['name']." ".$str2."</td>";
                }
                
                if($extras[$i+2]!=null){
                    $checkboxes .= "<td><input name='e_".$extras[$i+2]['id']."' value='".$extras[$i+2]['unitPrice']."' type='checkbox' style='background:#ffcc00;color:#cc3300;border:1px solid #e68a00;'> ".$extras[$i+2]['name']." ".$str3."</td>";
                }
                 
                $checkboxes .= "</tr>";
                $i=$i+3;
            }
            $checkboxes .= "</tbody></table></div></div>";
        }
        echo '<div class="modal-body">
	<table class="mainTablePizzaList table-sm" style="background:#ffcc00;color:#cc3300;border:none;font-size:16px;">
        <input type="hidden" name="product_id" value="'.$product['id'].'"></input>
		<tbody>
            <tr>
				<th scope="row">Product Type</th><td>'.$product['productType'].'</td>
			</tr>
			<tr>
				<th scope="row">Product Name</th><td>'.$product['name'].'</td>
			</tr>
			<tr>
				<th scope="row">Unit Price</th><td><span id="unitPrice">'.$product['unitPrice'].'</span> <small>CHF</small></td>
			</tr>
            <tr><td colspan="2">'.$checkboxes.'</td></tr>
            <tr>
				<th scope="row">Extra Price</th><td style="text-align:right"><input type="text" style="width:50px;background:#ffcc00;color:#cc3300;border:1px solid #e68a00;" name="extra_price" readonly value="0.0" id="extra_price"> <small>CHF</small></td>
			</tr>
            <tr>
				<th scope="row">Extras</th><td style="text-align:right"><input type="text" style="width:35px;background:#ffcc00;color:#cc3300;border:1px solid #e68a00;" name="total_options" readonly value="0" id="total_options"></td>
			</tr>
			<tr>
				<th scope="row">Quantity</th>
				<td style="text-align:right">
					<select name="no_of_items" id="no_of_items" style="background:#ffcc00;color:#cc3300;border:1px solid #e68a00;">
                        <option value="1" default>1</option>
                        <option value="2">2</option><option value="3" >3</option><option value="4">4</option>
                        <option value="5">5</option><option value="6" >6</option><option value="7">7</option>
                        <option value="8">8</option><option value="9" >9</option><option value="10">10</option>
                    </select>
				</td>
			</tr>
			<tr>
				<th scope="row">Total Price</th><td style="text-align:right">(('.$product['unitPrice'].' + <span id="e_price">0.0</span>) x <span id="changed_items">1</span>) =
                <input type="text" style="background:#ffcc00;color:#cc3300;border:1px solid #e68a00;"  name="changed_total" readonly id="changed_total" value="'.($product['unitPrice'] * 1).'"> <small>CHF</small></td>
			</tr>
            <tr>
				<th scope="row">User Input</th><td><textarea name="user_input" style="width:100%;background:#ffcc00;color:#cc3300;border:1px solid #e68a00;"></textarea></td>
			</tr>
		</tbody>
	</table>
</div>';
    }
}

function confirm_order(){    
    $type="Direct";
    $status="New";
    $paymentStatus="Unpaid";
    $deliveryType=$_POST['deliveryType'];
    $paymentMethod=$_POST['paymentMethod'];
    $customer_nick_name=$_POST['customer_nick_name'];
    $totalItems=$_POST['totalItems'];
    $totalPrice=$_POST['totalPrice'];
    
    $insert_order=
    "INSERT INTO `order` (paymentStatus, paymentMethod, status, type, deliveryType, totalPrice, created, totalNoOfItems, customerNickName) 
	VALUES (".cheSNull($paymentStatus).", ".cheSNull($paymentMethod).", ".cheSNull($status).", ".cheSNull($type).",
	".cheSNull($deliveryType).", ".cheNull($totalPrice).", CURRENT_TIMESTAMP(), ".cheNull($totalItems)." , ".cheSNull($customer_nick_name)." )";
    executeSQL($insert_order);
    $order_id=getSingleValue("SELECT max(id) id FROM `order`");
    $cart = $_SESSION["orderItemList"];
    insert_order_item($cart, $order_id);
    $order=getFetchArray("select * from `order` where id=".$order_id)[0];
    $subject="[New] : ".$order_id." > ".$order['customerNickName']." ".$order['created'];
    $message="<html><head><style>
table {
  border-collapse: collapse;
}

table, th, td {
  border-bottom: 1px solid #ddd;
}
th{
    background-color: #4CAF50;
    color: white;
    border-right: 1px solid white;
    font-weight: bold;
}
th, td {
  padding: 15px;
  text-align: left;  
  font-size:14px;
  font-family: 'Lucida Console', Courier, monospace;
}
</style></head><body>
<table>
	<tr>
		<th>Nick Name</th>
		<th>Order ID</th>
		<th>Placed Date</th>
		<th>Status</th>
		<th>Payment Status</th>
	</tr>
	<tr>
		<td>".$order['customerNickName']."</td>
		<td>".$order['id']."</td>
		<td>".$order['created']."</td>
		<td>".$order['status']."</td>
		<td>".$order['paymentStatus']."</td>
	</tr>
</table></body></html>";
    mailHelper("saransolutions.in@gmail.com", $subject, $message);
    return $order_id;
}

function insert_order_item($orderItems, $order_id){
    $count=1;
    foreach ($orderItems as $orderItem){
        $productId = $orderItem['productId'];
        $product=getFetchArray("select * from `product` where id = ".$productId)[0];
        $unitPrice = $product['unitPrice'];        
        $extraPrice=$orderItem['extra_price'];
        $noOfItems=$orderItem['no_of_items'];
        $totalPrice = ($unitPrice * $noOfItems ) + $extraPrice;
        $userInput=$orderItem['user_input'];
        
        // insert order item
        $insert_order_item = "INSERT INTO `order_item`(`seqNo`, `noOfItems`, `unitPrice`, `extrasPrice`, `userInput`, `totalPrice`, `order_id`, `product_id`) 
        VALUES (".cheNull($count).",".cheNull($noOfItems).",".cheNull($unitPrice).",".cheNull($extraPrice).",".cheSNull($userInput).",".cheNull($totalPrice).",".cheNull($order_id).",".cheNull($productId).")";
        executeSQL($insert_order_item);
        $order_item_id=getSingleValue("SELECT max(id) id FROM `order_item`");
        $count=$count+1;
        $extra=$orderItem['extra'];
        if (count($extra)>0){
            $count=1;
            foreach ($extra as $row){
                //insert order item extra
                $insert_order_item = "INSERT INTO `order_item_extras`(`seqNo`, `extra_id`, `order_item_id`) 
                VALUES (".cheNull($count).",".cheNull($row).",".cheNull($order_item_id).")";
                executeSQL($insert_order_item);
                $extra_id=getSingleValue("SELECT max(id) id FROM `order_item_extras`");
                $count=$count+1;            
            }
        }
    }
    return $order_item_id;
}

?>

