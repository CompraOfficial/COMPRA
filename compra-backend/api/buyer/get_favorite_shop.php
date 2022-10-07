<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $bId = clean($_POST['bId']);

        $checkFavProd = mysqli_query($GLOBALS['connection'], "SELECT *, favorite_shop.created_at AS fav_ca FROM favorite_shop JOIN trader ON trader.trader_id = favorite_shop.trader_id WHERE  buyer_id = {$bId}");
        if(mysqli_num_rows($checkFavProd) > 0){
            $favProds = array();
            while($favProd = mysqli_fetch_array($checkFavProd)){
                array_push($favProds, array(
                    'id'=>$favProd['rs_id'],
                    'trader_id'=>$favProd['trader_id'],
                    'created_at'=>$favProd['fav_ca'],
                    'company'=>$favProd['company']
                ));
            }
            echo json_encode($favProds);
        }
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }