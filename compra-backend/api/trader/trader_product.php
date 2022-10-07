<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $pId = clean($_POST['pId']);

        $traderProduct = mysqli_query($GLOBALS['connection'], "SELECT * FROM product WHERE product_id = {$pId}");
        if(mysqli_num_rows($traderProduct) > 0){
            while($product = mysqli_fetch_array($traderProduct)){
                $product_info = array(
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
                    'status'=>$product['status'] // (IN STOCK, OUT OF STOCK)
                );
                echo json_encode($product_info);
            }
        }
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }