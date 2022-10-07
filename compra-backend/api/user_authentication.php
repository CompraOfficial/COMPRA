<?php
    //Database Connection
    require '../local_settings/local_settings.php';
    require '../local_functions/local_functions.php';

    $GLOBALS['return_message'] = 404;

    class userAccount {
        var $user_id,
            $owner,
            $company,
            $phone,
            $address,
            $email,
            $password,
            $created_at,
            $status;
    };

    //-----> Variables
    $Username = 'null';
    $Password = 'null';
    $User_status = '0';

    if(isset($_POST['username']) AND isset($_POST['password'])){

        $Password = $_POST['password'];
        $Username = $_POST['username'];
        $UserType = $_POST['usertype'];

        $selected_user = new userAccount;

        //Admin = 0, Trader = 1, Buyer = 2 (User Type)
        $Admin_UserCode = 'Admin';
        $Trader_UserCode = 'Trader';
        $Buyer_UserCode = 'Buyer';

        if ($UserType == $Trader_UserCode) {
            authenticateTrader($selected_user, $Username, $Password);
        }else if($UserType == $Buyer_UserCode) {
            authenticateBuyer($selected_user, $Username, $Password);
        }else {
            authenticateAdmin($selected_user, $Username, $Password);
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