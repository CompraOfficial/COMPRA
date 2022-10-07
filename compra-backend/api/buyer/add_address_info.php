<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $aId = uniqid();
        $rName = clean($_POST['rName']);
        $aEmail = clean($_POST['aEmail']);
        $cNum = clean($_POST['cNum']);
        $addr = clean($_POST['addr']);
        $aBara = clean($_POST['aBara']);
        $aCity = clean($_POST['aCity']);
        $aZip = clean($_POST['aZip']);
        $buyerType = clean($_POST['buyerType']);

        mysqli_query($GLOBALS['connection'], 
            "INSERT INTO address VALUES(
                '{$aId}',
                '{$rName}',
                '{$aEmail}',
                '{$cNum}',
                '{$addr}',
                '{$aBara}',
                '{$aCity}',
                '{$aZip}',
                'Philippines',
                '{$buyerType}'
            )"
        );
        echo $aId;
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }