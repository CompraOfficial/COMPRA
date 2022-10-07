<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $pId = clean($_POST['pId']);
        $bId = clean($_POST['bId']);

        $checkFavProd = mysqli_query($GLOBALS['connection'], "SELECT * FROM favorite_product WHERE product_id = {$pId} AND buyer_id = {$bId}");
        if(mysqli_num_rows($checkFavProd) > 0){
            echo "Already Added as Favorite";
        }else{
            mysqli_query($GLOBALS['connection'], 
                "INSERT INTO favorite_product VALUES(
                    null,
                    {$bId},
                    {$pId},
                    NOW()             
                )"
            );
            echo "Successfully Added as Favorite";
        }
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }