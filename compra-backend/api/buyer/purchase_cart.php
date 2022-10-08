<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $cart_products = json_decode($_POST['cart_products']);
        $cart_del_fee = json_decode($_POST['cart_del_fee']);
        $aId = clean($_POST['aId']);
        $count = 0;
        
        foreach ($cart_products as $cart) {
            $getTraderProduct = mysqli_query($GLOBALS['connection'], 
                "SELECT * FROM cart 
                JOIN product ON  cart.product_id = product.product_id
                WHERE cart_id = {$cart}");
            // get product info
            if(mysqli_num_rows($getTraderProduct) > 0){
                while($product = mysqli_fetch_array($getTraderProduct)){
                    $product_name = $product['product_name'];
                    $product_type = $product['product_type'];
                    $category = $product['category'];
                    $moisture = $product['moisture'];
                    $age = $product['age'];
                    $price = $product['price'];
                    $quantity = $product['quantity'];
                }
            }
            // Add to purchase
            mysqli_query($GLOBALS['connection'], 
                "INSERT INTO purchase VALUES(
                    null,
                    {$cart},
                    '{$aId}',
                    '".$product_name."<br/>Category: ".$category."<br/>Type: ".$product_type."<br/>Moisture: ".$moisture."<br/>Age: ".$age." month/s',
                    '".$cart_del_fee[$count]."',
                    '" . ($price * $quantity) . "',
                    'COD',
                    'PENDING',
                    NOW()
                )"
            );
            // removed from cart
            mysqli_query($GLOBALS['connection'], 
                "UPDATE cart
                SET 
                    status = 'PURCHASED'
                WHERE cart_id = {$cart}"
            );
        }
        echo  "Purchase Successful" ;
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }