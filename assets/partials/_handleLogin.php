<?php
    require '_functions.php';
    $conn = db_connect();

    if(!$conn)
        die("Oh Shoot!! Connection Failed");

    if(isset($_POST['ok'])){
        header("location: ../../index.php");

    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `users` WHERE user_name='$username';";
        $result = mysqli_query($conn, $sql);

        if($row = mysqli_fetch_assoc($result)){
            $hash = $row['user_password'];
            if($password==$hash)
            {
                // // Login Sucessfull
                // echo "hello";
                session_start();
                $_SESSION["loggedIn"] = true;
                $_SESSION["user_id"] = $row["user_id"];

                header("location: ../../admin/dashboard.php");
                exit;
            }
             echo "<center><h1 style='color:blue;margin-top:100px;'>Invalid login credintionals</h1></center>";
            header("refresh:2;url=../../index.php");

           
        }
    }
?>