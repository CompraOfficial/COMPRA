<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');
    
    try{
        $tid = clean($_POST['tid']);

        $traderSQL = mysqli_query($GLOBALS['connection'], "SELECT * FROM trader WHERE trader_id = {$tid}");
        if(mysqli_num_rows($traderSQL) > 0){
            while($trader = mysqli_fetch_array($traderSQL)){
                echo json_encode(array(
                    'id'=>$trader['trader_id'],
                    'company'=>$trader['company'],
                    'address'=>$trader['address'],
                    'phone'=>$trader['phone']
                ));
            }
        }
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }