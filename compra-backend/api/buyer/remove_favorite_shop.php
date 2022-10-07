<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $tid = clean($_POST['tid']);
        $bId = clean($_POST['bId']);

        mysqli_query($GLOBALS['connection'], "DELETE FROM favorite_shop WHERE trader_id = {$tid} AND buyer_id = {$bId} ");
        echo "Successfully removed as Favorite";
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }