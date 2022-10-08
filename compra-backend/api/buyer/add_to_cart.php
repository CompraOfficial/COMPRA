<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $pId = clean($_POST['pId']);
        $qty = clean($_POST['qty']);
        $bId = clean($_POST['bId']);

        $checkCart = mysqli_query($GLOBALS['connection'], "SELECT *, cart.status AS cStatus FROM cart JOIN product ON product.product_id = cart.product_id WHERE cart.product_id = {$pId} AND buyer_id = {$bId} AND cart.status = 'IN CART'");
        if(mysqli_num_rows($checkCart) > 0){
            while($product = mysqli_fetch_array($checkCart)){
                $sumQty = $product['quantity'] + $qty;
                if($product['cStatus'] == "IN CART"){
                    if($product['stock'] > $sumQty ){
                        mysqli_query($GLOBALS['connection'], 
                            "UPDATE cart SET
                                quantity = {$sumQty}
                            WHERE product_id = {$pId} AND buyer_id = {$bId}"
                        );
                        echo "Successfully Added To Cart";
                    }else{
                        echo "Unable to add to cart! Please check the quantity of your purchase.";
                    }
                }
            }
        }else{
            mysqli_query($GLOBALS['connection'], 
                "INSERT INTO cart VALUES(
                    null,
                    {$bId},
                    {$pId},
                    {$qty},
                    'IN CART',
                    NOW()             
                )"
            );
            echo "Successfully Added To Cart";
        }
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }