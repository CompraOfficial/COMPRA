<?php
   function cors() {
         // set content return type
         // header('Content-Type: application/json');

         // Allow from any origin
         if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
            header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');    // cache for 1 day
         }

         // Access-Control headers are received during OPTIONS requests
         if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
               // may also be using PUT, PATCH, HEAD etc
               header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
               header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");

            exit(0);
         }
   }
   cors();

    $server_name = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'compra';

     //Connections: You can use '$connection' or '$conn' the later is shorter.
     $GLOBALS['connection'] = mysqli_connect($server_name, $db_username, $db_password);
     $GLOBALS['conn'] = mysqli_connect($server_name, $db_username, $db_password);

     $dbconfig = mysqli_select_db($connection,$db_name);

     //For Debugging Connection on Database
     if($dbconfig){
        //echo 'Connected to Database';
     }else{
        //echo 'Unable to connect to database';
     }


?>