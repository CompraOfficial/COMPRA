<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $tid = clean($_POST['tid']);
        $bId = clean($_POST['bId']);

        $checkFavProd = mysqli_query($GLOBALS['connection'], "SELECT * FROM favorite_shop WHERE trader_id = {$tid} AND buyer_id = {$bId}");
        if(mysqli_num_rows($checkFavProd) > 0){
            echo "Already Added as Favorite";
        }else{
            mysqli_query($GLOBALS['connection'], 
                "INSERT INTO favorite_shop VALUES(
                    null,
                    {$bId},
                    {$tid},
                    NOW()             
                )"
            );
            echo "Successfully Added as Favorite";
        }
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }