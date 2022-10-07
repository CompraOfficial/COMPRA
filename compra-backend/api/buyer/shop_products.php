<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');

    try{
        $products = mysqli_query($GLOBALS['connection'], "SELECT *, product.status AS pStatus FROM product JOIN trader ON product.trader_id = trader.trader_id");
        if(mysqli_num_rows($products) > 0){
            $outputProducts = array();
            while($product = mysqli_fetch_array($products)){
                array_push($outputProducts, array(
                    'id'=>$product['product_id'],
                    'product_name'=>$product['product_name'],
                    'description'=>$product['description'],
                    'product_type'=>$product['product_type'],
                    'category'=>$product['category'],
                    'moisture'=>$product['moisture'],
                    'age'=>$product['age'],
                    'unit_measurement'=>$product['unit_measurement'],
                    'price'=>$product['price'],
                    'stock'=>$product['stock'],
                    'deli_fee_within'=>$product['deli_fee_within'],
                    'deli_fee_outside'=>$product['deli_fee_outside'],
                    'img1'=>$product['img1'],
                    'img2'=>$product['img2'],
                    'img3'=>$product['img3'],
                    'img4'=>$product['img4'],
                    'address'=>$product['address'],
                    'company'=>$product['company'],
                    'status'=>$product['pStatus'] // (IN STOCK, OUT OF STOCK, DELETED)
                ));
            }
            echo json_encode($outputProducts);
        }
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }