<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $tag = clean($_POST['tag']);
        $pId = clean($_POST['pId']);
        if(isset($_FILES['img'])){
            $pImg = $_FILES['img'];
            $pImgExt = explode('.', $pImg['name']);
            $pImgActualExt = strtolower(end($pImgExt));
            $pImgNameExt = uniqid('', true) . "." . $pImgActualExt;
            $pImgDestination = "uploads/products/" . $pImgNameExt;
            move_uploaded_file($pImg['tmp_name'], $pImgDestination);
        }else{$pImgNameExt = null;}

        mysqli_query($GLOBALS['connection'], 
            "UPDATE product
            SET 
                img{$tag} = '{$pImgNameExt}'
            WHERE product_id = {$pId}"
        );

        echo "Img Changed!";
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }
