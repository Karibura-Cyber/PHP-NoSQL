<?php
$username = $_POST['username'];
$password = $_POST['password'];
$password = base64_encode($password);

//read json file
$file = file_get_contents("data/{$username}_data.json");
$json = json_decode($file, true);

if ($username == $json['username'] && $password == $json['password']) {
    session_start();
    $_SESSION['username'] = $json['username'];
    session_write_close();
    header("Location: /auth");
} else {
    
    //wait for 2 seconds
    header("refresh:2;url=register.html");    
}
?>