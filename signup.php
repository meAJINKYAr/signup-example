<?php
require('dbConfig.php'); // import databse config
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2); // get url
switch ($request_uri[0]) {
    case '/signup/signup.php':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Database connection
            $servername = $config['HOST'];
            $username = $config['USER'];
            $password = $config['PASS'];
            $db = $config['DB'];
            // Create connection
            $conn = new mysqli($servername, $username, $password,$db);

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            //echo "Connected successfully";
            $fname = $lname = $email = $mobile = $state = $city = $password = 0;

            if($_POST['fname']){
                // Insert Data Into DB 
                $fname = test_input($_POST["fname"]);
                $lname = test_input($_POST['lname']);
                $email = test_input($_POST['email']);
                $contact = test_input($_POST['mobile']);
                $state = test_input($_POST['state']);
                $city = test_input($_POST['city']);
                $password = test_input($_POST['password']);
                $password = password_hash((string)$password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (firstname, lastname, email, contact,state,city,password)
                VALUES ('$fname','$lname','$email','$contact','$state','$city','$password')";

                if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    $conn->close();
                    echo "<script>window.location.assign('index.php')</script>";
                }
                $conn->close();
                // if data is inserted in DB then create session
                session_start();
                $_SESSION['fname'] = $fname;
                echo "<script>window.location.assign('home.php')</script>";
                break;
            }
        }
    default:
        echo "<script>window.location.assign('index.php')</script>";
        break;
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>