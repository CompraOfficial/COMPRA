<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $user_id = clean($_POST['user_id']);

        $getPurchases = mysqli_query($GLOBALS['connection'], 
            "SELECT 
                *, 
                purchase.created_at AS pCreated_at,
                purchase.status AS pStatus
            FROM cart 
            JOIN purchase ON purchase.cart_id = cart.cart_id
            JOIN product ON cart.product_id = product.product_id
            JOIN trader ON trader.trader_id = product.trader_id
            WHERE 
                buyer_id = {$user_id} 
            AND 
                cart.status = 'PURCHASED'");
        if(mysqli_num_rows($getPurchases) > 0){
            $purchases = array();
            while($purchase = mysqli_fetch_array($getPurchases)){
                array_push($purchases, array(
                    'purchase_id'=>$purchase['purchase_id'],
                    'cart_id'=>$purchase['cart_id'],
                    'price'=>$purchase['price'],
                    'delivery_fee'=>$purchase['delivery_fee'],
                    'delivery_type'=>$purchase['delivery_type'],
                    'pCreated_at'=>$purchase['pCreated_at'],
                    'product_info'=>$purchase['product_info'],
                    'company'=>$purchase['company'],
                    'pStatus'=>$purchase['pStatus']
                ));
            }
            echo json_encode($purchases);
        }
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }