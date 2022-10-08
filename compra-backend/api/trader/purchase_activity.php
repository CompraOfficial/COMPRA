<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $purId = clean($_POST['purId']);
        $purStatus = clean($_POST['purStatus']);

        mysqli_query($GLOBALS['connection'],
        "UPDATE purchase
        SET 
            status = '{$purStatus}'
        WHERE purchase_id = {$purId}
        ");
        echo "Successfully " . $purStatus . " the Order!";

    }catch(Exception $e){
        echo "Error:" . $e->getMessage();

    }