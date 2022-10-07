<?php
/* Do Not Import Detabase Credentials/local_settings here.
This is a purely function dump file.
*/

function authenticateTrader($selected_user, $Username, $Password) {

    $query = "select * from trader";
    $run_query = mysqli_query($GLOBALS['connection'], $query);

    while ($row = mysqli_fetch_array($run_query)) {
        if ($Username == $row['email'] AND $Password == $row['password']) {

                $selected_user->user_id = $row['trader_id'];
                $selected_user->owner = $row['owner'];
                $selected_user->company = $row['company'];
                $selected_user->phone = $row['phone'];
                $selected_user->address = $row['address'];
                $selected_user->email = $row['email'];
                $selected_user->password = $row['password'];
                $selected_user->created_at = $row['created_at'];
                $selected_user->status = $row['status'];

                $GLOBALS['return_message'] = $selected_user;

                //Enable for debugging,
                //var_dump($GLOBALS['return_message']);

                return;
        }
    }
}

function authenticateBuyer($selected_user, $Username, $Password) {

    $query = "select * from buyer";
    $run_query = mysqli_query($GLOBALS['connection'], $query);

    while ($row = mysqli_fetch_array($run_query)) {
        if ($Username == $row['email'] AND $Password == $row['password']) {

                $selected_user->user_id = $row['buyer_id'];
                $selected_user->owner = $row['owner'];
                $selected_user->company = $row['company'];
                $selected_user->phone = $row['phone'];
                $selected_user->address = $row['address'];
                $selected_user->email = $row['email'];
                $selected_user->password = $row['password'];
                $selected_user->created_at = $row['created_at'];
                $selected_user->status = $row['status'];

                $GLOBALS['return_message'] = $selected_user;

                //Enable for debugging,
                //var_dump($GLOBALS['return_message']);
                return;
        }
    }
}

function authenticateAdmin($selected_user, $Username, $Password) {

    $query = "select * from admin";
    $run_query = mysqli_query($GLOBALS['connection'], $query);

    while ($row = mysqli_fetch_array($run_query)) {
        if ($Username == $row['email'] AND $Password == $row['password']) {

                $selected_user->user_id = $row['admin_id'];
                $selected_user->owner = '';
                $selected_user->company = '';
                $selected_user->phone = $row['contact'];
                $selected_user->address = $row['address'];
                $selected_user->email = $row['email'];
                $selected_user->password = $row['password'];
                $selected_user->created_at = $row['created_at'];
                $selected_user->status = '';

                $GLOBALS['return_message'] = $selected_user;

                //Enable for debugging,
                //var_dump($GLOBALS['return_message']);

                return;
        }
    }
}

function fetchTraderProducts($TraderID, $TraderProduct) {
    $query = "select distinct * from product left join product_image on product_image.product_id
    = product.product_id where product.trader_id =".$TraderID;

    $run_query = mysqli_query($GLOBALS['connection'], $query);

    $TraderProducts = array();

    while($row = mysqli_fetch_array($run_query)) {

        $TraderProduct = new TraderProduct;

        $TraderProduct->product_id = $row['product_id'];
        $TraderProduct->trader_id = $row['trader_id'];
        $TraderProduct->product_name = $row['product_name'];
        $TraderProduct->description = $row['description'];
        $TraderProduct->product_type = $row['product_type'];
        $TraderProduct->category = $row['category'];
        $TraderProduct->moisture = $row['moisture'];
        $TraderProduct->age = $row['age'];
        $TraderProduct->unit_measurement = $row['unit_measurement'];
        $TraderProduct->price = $row['price'];
        $TraderProduct->status = $row['status'];
        $TraderProduct->created_at = $row['created_at'];

        array_push($TraderProducts,$TraderProduct);
    };

    $GLOBALS['return_message'] = $TraderProducts;
}


// clean the data before saving to database
function clean($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

function registerTrader($newUser) {
    $query = "insert into trader (owner,company,phone,address,email,password,created_at,status)
    values('$newUser->owner','$newUser->company','$newUser->phone','$newUser->address','$newUser->email','$newUser->password','$newUser->created_at','active')";

    $run_query = mysqli_query($GLOBALS['connection'], $query);

    if ($run_query) {
        $GLOBALS['return_message'] = $newUser;
    } else {
        $GLOBALS['return_message'] = 500;
    }
}

function registerBuyer($newUser) {
    $query = "insert into buyer (owner,company,phone,address,email,password,created_at,status)
    values('$newUser->owner','$newUser->company','$newUser->phone','$newUser->address','$newUser->email','$newUser->password','$newUser->created_at','active')";

    $run_query = mysqli_query($GLOBALS['connection'], $query);

    if ($run_query) {
        $GLOBALS['return_message'] = $newUser;
    } else {
        $GLOBALS['return_message'] = 500;
    }
}

?>