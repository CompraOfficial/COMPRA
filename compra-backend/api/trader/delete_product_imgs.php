<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $pId = clean($_POST['pId']);

        mysqli_query($GLOBALS['connection'], 
            "UPDATE product
            SET 
                img1 = '',
                img2 = '',
                img3 = '',
                img4 = ''
            WHERE product_id = {$pId}"
        );

        echo "Successfully Removed the Images!";
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }
