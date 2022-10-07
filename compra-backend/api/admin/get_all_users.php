<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    $getAllBuyer = mysqli_query($GLOBALS['connection'], "SELECT * FROM buyer");
    $getAllTrader = mysqli_query($GLOBALS['connection'], "SELECT * FROM trader");
    if(mysqli_num_rows($getAllBuyer) > 0 || mysqli_num_rows($getAllTrader) > 0){
        $allUsers = array();
        while($buyer = mysqli_fetch_array($getAllBuyer)){
            array_push($allUsers, array(
                'id'=>$buyer['buyer_id'],
                'company'=>$buyer['company'],
                'owner'=>$buyer['owner'],
                'type'=>'buyer',
                'contact'=>$buyer['phone'],
                'address'=>$buyer['address'],
                'email'=>$buyer['email'], 
                'status'=>$buyer['status'] // (Activated, Banned, Pending, Rejected)
            ));
        }
        while($trader = mysqli_fetch_array($getAllTrader)){
            array_push($allUsers, array(
                'id'=>$trader['trader_id'],
                'company'=>$trader['company'],
                'owner'=>$trader['owner'],
                'type'=>'trader',
                'contact'=>$trader['phone'],
                'address'=>$trader['address'],
                'email'=>$trader['email'],
                'status'=>$trader['status']
            ));
        }
        echo json_encode($allUsers);
    }