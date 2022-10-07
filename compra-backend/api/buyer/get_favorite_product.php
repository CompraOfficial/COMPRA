<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $bId = clean($_POST['bId']);

        $checkFavProd = mysqli_query($GLOBALS['connection'], "SELECT *, favorite_product.created_at AS fav_ca FROM favorite_product JOIN product ON product.product_id = favorite_product.product_id WHERE  buyer_id = {$bId}");
        if(mysqli_num_rows($checkFavProd) > 0){
            $favProds = array();
            while($favProd = mysqli_fetch_array($checkFavProd)){
                array_push($favProds, array(
                    'id'=>$favProd['rp_id'],
                    'buyer_id'=>$favProd['buyer_id'],
                    'product_id'=>$favProd['product_id'],
                    'created_at'=>$favProd['fav_ca'],
                    'product_name'=>$favProd['product_name']
                ));
            }
            echo json_encode($favProds);
        }
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }