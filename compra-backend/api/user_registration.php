<?php
    //Database Connection
    require '../local_settings/local_settings.php';
    require '../local_functions/local_functions.php';

    $GLOBALS['return_message'] = 404;

    class userAccount {
        var $owner,
            $company,
            $phone,
            $address,
            $email,
            $password,
            $created_at,
            $status;
    };

    //-----> Variables
    $owner = '';
    $company = '';
    $phone = '';
    $address = '';
    $email = '';
    $password = '';
    $created_at = '';
    $userType = '';

    if(isset($_POST['company']) AND isset($_POST['owner']) AND
        isset($_POST['phone']) AND isset($_POST['address']) AND
        isset($_POST['barangay']) AND isset($_POST['city']) AND
        isset($_POST['zipcode']) AND isset($_POST['email']) AND
        isset($_POST['password']) AND isset($_POST['usertype'])){

        $owner = $_POST['owner'];
        $company = $_POST['company'];
        $phone = $_POST['phone'];
        $address = $_POST['address'].'---'.$_POST['barangay'].'--'.$_POST['city'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $created_at = date('d-m-y h:i:s');
        $UserType = $_POST['usertype'];

        $new_user = new userAccount;

        $new_user->owner = $owner;
        $new_user->company = $company;
        $new_user->phone = $phone;
        $new_user->address = $address;
        $new_user->email = $email;
        $new_user->password = $password;
        $new_user->created_at = $created_at;
        $new_user->status = 'active';

        //Trader = 1, Buyer = 2 (User Type)
        $Trader_UserCode = 'Trader';
        $Buyer_UserCode = 'Buyer';

        if ($UserType == $Trader_UserCode) {
            registerTrader($new_user);
        }else if($UserType == $Buyer_UserCode) {
            registerBuyer($new_user);
        }else {
            //Unknown user type.
            //echo 'Something went wrong';
            $GLOBALS['return_message'] = 501;
        }

    }else{
        // Status Code 500: BAD Data - No username or password or both has been received.
        // echo 'No Username and Password Found.';
        $GLOBALS['return_message'] = 500;
        echo json_encode($GLOBALS['return_message']);
        return;
    }

    echo json_encode($GLOBALS['return_message']);
?>