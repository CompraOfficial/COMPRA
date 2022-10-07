<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $pId = clean($_POST['pId']);

        mysqli_query($GLOBALS['connection'], 
            "UPDATE product
            SET 
                status = 'DELETED'
            WHERE product_id = {$pId}"
        );

        echo "Successfully deleted the product!";
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }
