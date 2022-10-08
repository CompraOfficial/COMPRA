<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $user_id = clean($_POST['user_id']);
        $owner = clean($_POST['owner']);
        if( $owner ==  ""){
            echo "Owner name is needed!";
            die;
        }
        $company = clean($_POST['company']);
        if( $company ==  ""){
            echo "Company name is needed!";
            die;
        }
        $phone = clean($_POST['phone']);
        if( $phone ==  ""){
            echo "Phone is needed!";
            die;
        }
        $email = clean($_POST['email']);
        if( $email ==  ""){
            echo "Email is needed!";
            die;
        }
        $cPass = clean($_POST['cPass']);
        $nPass = clean($_POST['nPass']);
        $cnPass = clean($_POST['cnPass']);

        if($cPass != "" || $nPass != "" || $cnPass != ""){
            if( $cPass ==  ""){
                echo "Confirm password is needed!";
                die;
            }
            if( $nPass ==  ""){
                echo "New password is needed!";
                die;
            }
            if( $cnPass ==  ""){
                echo "Confirm new password is needed!";
                die;
            }

            if( $nPass !=  $cnPass){
                echo "New passwords are not matched!";
                die;
            }
    
            $getUserInfo = mysqli_query($GLOBALS['connection'], 
                "SELECT * FROM buyer 
                WHERE buyer_id = {$user_id}");
            if(mysqli_num_rows($getUserInfo) > 0){
                while($userInfo = mysqli_fetch_array($getUserInfo)){
                    if($userInfo['password'] == $cPass){
                        mysqli_query($GLOBALS['connection'], 
                        "UPDATE buyer
                        SET
                            password = {$nPass}
                        WHERE  buyer_id = {$user_id}    
                        ");
                    }else{
                        echo "Confirm password incorrect!";
                        die;
                    }
                }
            }

        }
        
        mysqli_query($GLOBALS['connection'], 
        "UPDATE buyer
            SET
                owner = '{$owner}',
                company = '{$company}',
                phone = '{$phone}',
                email = '{$email}'
            WHERE  buyer_id = {$user_id}    
        ");
        echo "Successfully updated your profile";
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }