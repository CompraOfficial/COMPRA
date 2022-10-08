<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $user_id = clean($_POST['user_id']);

        $getPurchases = mysqli_query($GLOBALS['connection'], 
            "SELECT 
                *, 
                purchase.created_at AS pCreated_at,
                purchase.status AS pStatus,
                purchase.price AS pPrice
            FROM  purchase
            JOIN cart ON purchase.cart_id = cart.cart_id
            JOIN product ON cart.product_id = product.product_id
            JOIN buyer ON buyer.buyer_id = cart.buyer_id
            WHERE 
                product.trader_id = {$user_id} 
            AND 
                cart.status = 'PURCHASED'");
        if(mysqli_num_rows($getPurchases) > 0){
            $purchases = array();
            while($purchase = mysqli_fetch_array($getPurchases)){
                array_push($purchases, array(
                    'purchase_id'=>$purchase['purchase_id'],
                    'cart_id'=>$purchase['cart_id'],
                    'price'=>$purchase['pPrice'],
                    'delivery_fee'=>$purchase['delivery_fee'],
                    'delivery_type'=>$purchase['delivery_type'],
                    'pCreated_at'=>$purchase['pCreated_at'],
                    'product_info'=>$purchase['product_info'],
                    'owner'=>$purchase['owner'],
                    'pStatus'=>$purchase['pStatus'],
                    'img1'=>$purchase['img1'],
                    'quantity'=>$purchase['quantity']
                ));
            }
            echo json_encode($purchases);
        }
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }