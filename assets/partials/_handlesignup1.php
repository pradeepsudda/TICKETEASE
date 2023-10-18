<?php
echo "hello";
    function db_connect()
    {
        $servername = 'localhost:3307';
        $username = 'root';
        $password = '';
        $database = 'sbtbsphp';

        $conn = mysqli_connect($servername, $username, $password, $database);
        return $conn;
    }

    $conn = db_connect();

    if(!$conn)
        die("Oh Shoot!! Connection Failed");

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sbt"]))
    {

        $fullName = "User";
        $username = $_POST["username"];
        $password = $_POST["password"]; 

     
        $signup_sucess = false;

         $hash = $password;
            $sql = "INSERT INTO `users` (`user_name`, `user_fullname`, `user_password`, `user_created`) VALUES ('$username', '$fullName', '$hash', current_timestamp());";

            $result = mysqli_query($conn, $sql);
            
            if($result){
                header("location:../../index.php");
                
            }

        
        
    }

?>