<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $pId = clean($_POST['pId']);
        $pName = clean($_POST['pName']);
        $pCat = clean($_POST['pCat']);
        $pType = clean($_POST['pType']);
        $pMois = clean($_POST['pMois']);
        $pAge = clean($_POST['pAge']);
        $pUniMea = clean($_POST['pUniMea']);
        $pPrice = clean($_POST['pPrice']);
        $pStocks = clean($_POST['pStocks']);
        $pDelFeeIn = clean($_POST['pDelFeeIn']);
        $pDelFeeOut = clean($_POST['pDelFeeOut']);
        $pDesc = clean($_POST['pDesc']);

        mysqli_query($GLOBALS['connection'], 
            "UPDATE product
            SET 
                product_name = '{$pName}',
                description = '{$pDesc}',
                product_type = '{$pType}',
                category = '{$pCat}',
                moisture = '{$pMois}',
                age = '{$pAge}',
                unit_measurement = '{$pUniMea}',
                price = '{$pPrice}',
                stock = '{$pStocks}',
                deli_fee_within = '{$pDelFeeIn}',
                deli_fee_outside = '{$pDelFeeOut}',
                status = 'IN STOCK'
            WHERE product_id = {$pId}"
        );

        echo "Successfully Edited!";
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }
