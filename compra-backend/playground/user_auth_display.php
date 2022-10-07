<?php

$auth_link = '../api/user_authentication.php';

?>

<html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <body>

        <form method="POST">
            <label>Username: </label>
            <input type="text" id="Username" name="Username" />
            <br />
            <label>Password: </label>
            <input type="text" id="Password" name="Password" />
            <br />
            <br />
        </form>
        <Button type="submit" id="submit" >Submit</Button>

    </body>
    <script>
        function auth_user() {
           let user_username = document.getElementById('Username').value;
           let user_password = document.getElementById('Password').value;
        }

        $(document).ready(function(){
            const submit_btn = document.getElementById('submit');
            $("button").click(function(){
                let user_username = document.getElementById('Username').value;
                let user_password = document.getElementById('Password').value;

                console.log(user_username);

                $.post("../api/user_authentication.php",
                    {
                        username: user_username,
                        password: user_password
                    },
                function(data,status){
                    alert("Data: " + data + "\nStatus: " + status);
                });
            });
        });

    </script>

</html>
