<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $addrId = clean($_POST['addrId']);

        $getAddress = mysqli_query($GLOBALS['connection'], 
            "SELECT 
                *
            FROM address
            WHERE 
                address_id = '{$addrId}'");
        if(mysqli_num_rows($getAddress) > 0){
            while($address = mysqli_fetch_array($getAddress)){
                echo json_encode(array(
                    'address_id'=>$address['address_id'],
                    'receiver'=>$address['receiver'],
                    'email'=>$address['email'],
                    'phone'=>$address['phone'],
                    'address'=>$address['address'],
                    'barangay'=>$address['barangay'],
                    'city'=>$address['city'],
                    'postal'=>$address['postal'],
                    'country'=>$address['country'],
                    'buyer_type'=>$address['buyer_type']
                ));
            }
        }
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }