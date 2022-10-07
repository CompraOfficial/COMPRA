<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $tId = clean($_POST['tId']);
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
        if(isset($_FILES['pImg1'])){
            $pImg1 = $_FILES['pImg1'];
            $pImg1Ext = explode('.', $pImg1['name']);
            $pImg1ActualExt = strtolower(end($pImg1Ext));
            $pImg1NameExt = uniqid('', true) . "." . $pImg1ActualExt;
            $pImg1Destination = "uploads/products/" . $pImg1NameExt;
            move_uploaded_file($pImg1['tmp_name'], $pImg1Destination);
        }else{$pImg1NameExt = null;}
        if(isset($_FILES['pImg2'])){
            $pImg2 = $_FILES['pImg2'];
            $pImg2Ext = explode('.', $pImg2['name']);
            $pImg2ActualExt = strtolower(end($pImg2Ext));
            $pImg2NameExt = uniqid('', true) . "." . $pImg2ActualExt;
            $pImg2Destination = "uploads/products/" . $pImg2NameExt;
            move_uploaded_file($pImg2['tmp_name'], $pImg2Destination);
        }else{$pImg2NameExt = null;}
        if(isset($_FILES['pImg3'])){
            $pImg3 = $_FILES['pImg3'];
            $pImg3Ext = explode('.', $pImg3['name']);
            $pImg3ActualExt = strtolower(end($pImg3Ext));
            $pImg3NameExt = uniqid('', true) . "." . $pImg3ActualExt;
            $pImg3Destination = "uploads/products/" . $pImg3NameExt;
            move_uploaded_file($pImg3['tmp_name'], $pImg3Destination);
        }else{$pImg3NameExt = null;}
        if(isset($_FILES['pImg4'])){
            $pImg4 = $_FILES['pImg4'];
            $pImg4Ext = explode('.', $pImg4['name']);
            $pImg4ActualExt = strtolower(end($pImg4Ext));
            $pImg4NameExt = uniqid('', true) . "." . $pImg4ActualExt;
            $pImg4Destination = "uploads/products/" . $pImg4NameExt;
            move_uploaded_file($pImg4['tmp_name'], $pImg4Destination);
        }else{$pImg4NameExt = null;}

        mysqli_query($GLOBALS['connection'], 
            "INSERT INTO product VALUES(
                null,
                {$tId},
                '{$pName}',
                '{$pDesc}',
                '{$pType}',
                '{$pCat}',
                '{$pMois}',
                '{$pAge}',
                '{$pUniMea}',
                '{$pPrice}',
                '{$pStocks}',
                '{$pDelFeeIn}',
                '{$pDelFeeOut}',
                'IN STOCK',
                '{$pImg1NameExt}',
                '{$pImg2NameExt}',
                '{$pImg3NameExt}',
                '{$pImg4NameExt}',
                NOW()             
            )"
        );

        echo "Successfully Added!";
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }
