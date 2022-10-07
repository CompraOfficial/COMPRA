<?php
    include('../../local_settings/local_settings.php');
    include('../../local_functions/local_functions.php');

    if(isset($_POST['uType']) && isset($_POST['uUserId'])){
        $uType = clean($_POST['uType']);
        $uUserId = clean($_POST['uUserId']);
        $stats = clean($_POST['stats']);

        mysqli_query($GLOBALS['connection'], 
            "UPDATE {$uType}
            SET status = '{$stats}'
            WHERE {$uType}_id = {$uUserId}" 
        );
        
        echo "Successfully {$stats}!";

        echo "UPDATE {$uType}
        SET status = '{$stats}'
        WHERE {$uType}_id = {$uUserId}";
    }else {
        echo "Check your conenction!";
    }
   