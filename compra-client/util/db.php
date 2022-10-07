<?php
    $link = mysqli_connect(
        "localhost", 
        "root", 
        ""
    );
        
    if($link){
        mysqli_select_db($link, "compra"); 
    }else{
        echo "unable to connect!";
        die;
    }
?>