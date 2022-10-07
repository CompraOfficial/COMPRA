<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $user_id = clean($_POST['user_id']);

        $getTraderProduct = mysqli_query($GLOBALS['connection'], "SELECT * FROM product WHERE trader_id = {$user_id}");
        if(mysqli_num_rows($getTraderProduct) > 0){
            $traderProducts = array();
            while($product = mysqli_fetch_array($getTraderProduct)){
                array_push($traderProducts, array(
                    'id'=>$product['product_id'],
                    'product_name'=>$product['product_name'],
                    'product_type'=>$product['product_type'],
                    'category'=>$product['category'],
                    'price'=>$product['price'],
                    'stock'=>$product['stock'],
                    'status'=>$product['status'] // (IN STOCK, OUT OF STOCK)
                ));
            }
            echo json_encode($traderProducts);
        }
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }