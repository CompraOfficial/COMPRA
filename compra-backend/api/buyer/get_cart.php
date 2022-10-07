<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $bId = clean($_POST['bId']);

        $carts = mysqli_query($GLOBALS['connection'], 
            "SELECT *, cart.status AS cStatus, product.status AS pStatus FROM cart
            JOIN product ON cart.product_id = product.product_id  
            JOIN trader ON product.trader_id = trader.trader_id  
            WHERE buyer_id = {$bId} AND cart.status = 'IN CART'"
        );
        if(mysqli_num_rows($carts) > 0){
            $incart = array();
            while($cart = mysqli_fetch_array($carts)){
                array_push($incart, array(
                    'cart_id'=>$cart['cart_id'],
                    'product_id'=>$cart['product_id'],
                    'img1'=>$cart['img1'],
                    'product_name'=>$cart['product_name'],
                    'category'=>$cart['category'],
                    'product_type'=>$cart['product_type'],
                    'moisture'=>$cart['moisture'],
                    'age'=>$cart['age'],
                    'price'=>$cart['price'],
                    'unit_measurement'=>$cart['unit_measurement'],
                    'deli_fee_within'=>$cart['deli_fee_within'],
                    'deli_fee_outside'=>$cart['deli_fee_outside'],
                    'pStatus'=>$cart['pStatus'],
                    'cStatus'=>$cart['cStatus'],
                    'quantity'=>$cart['quantity'],
                    'address'=>$cart['address']
                ));
            }
            echo json_encode($incart);
        }else{            
            echo json_encode("Nothing is In the Cart");
        }
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }