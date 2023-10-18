<?php
    require '_functions.php';

    $conn = db_connect();

    if(!$conn)
        die("Oh Shoot!! Connection Failed");

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"]))
    {

        $fullName = $_POST["firstName"] . " " . $_POST["lastName"];
        $username = $_POST["username"];
        $password = $_POST["password"]; 

        $signup_sucess = false;
        $hash = $password;
        $sql = "INSERT INTO `users` (`user_name`, `user_fullname`, `user_password`, `user_created`) VALUES ('$username', '$fullName', '$hash', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("location: ../../admin/dashboard.php");

        }
                

    }

?>