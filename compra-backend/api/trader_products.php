<?php
    //Database Connection
    require '../local_settings/local_settings.php';
    require '../local_functions/local_functions.php';

    $GLOBALS['return_message'] = 404;

    class TraderProduct {
        var $product_id,
            $trader_id,
            $product_name,
            $description,
            $product_type,
            $category,
            $moisture,
            $age,
            $unit_measurement,
            $price,
            $status,
            $created_at;
    };

    //-----> Variables
    $TraderID = 'null';

    if(isset($_POST['traderID'])){

        $TraderID = $_POST['traderID'];

        $TraderProduct = new TraderProduct;

        fetchTraderProducts($TraderID, $TraderProduct);
    }else{
        // Status Code 500: BAD Data - No traderID has been received.
        // echo 'No Username and Password Found.';
        $GLOBALS['return_message'] = 500;
        echo json_encode($GLOBALS['return_message']);
        return;
    }

    echo json_encode($GLOBALS['return_message']);
?>