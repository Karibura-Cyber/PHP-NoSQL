<?php
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Check if the passwords match
if ($password != $confirm_password) {
    echo "Passwords do not match";
    //wait 2 seconds
    header("Refresh:2; url=/auth");
}
else{
    //encode base64 password
    $password = base64_encode($password);
    //make json file
    $json = array(
        "username" => $username,
        "password" => $password
    );
    //write to file
    $fp = fopen("data/{$username}_data.json", 'w');
    fwrite($fp, json_encode($json));
    fclose($fp);
    header("Refresh:0; url=/auth/login.html");
}

?>