<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $pId = clean($_POST['pId']);
        $bId = clean($_POST['bId']);

        mysqli_query($GLOBALS['connection'], "DELETE FROM cart WHERE product_id = {$pId} AND buyer_id = {$bId} AND status = 'IN CART'");
        echo "Successfully removed the product in the cart";
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();

    }