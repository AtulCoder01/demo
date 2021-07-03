<?php
session_start();
// include database
require_once('db.php');

if( isset( $_POST ) ){
    $username = $conn->real_escape_string( $_POST['username'] );
    $password = $conn->real_escape_string( $_POST['password'] );

    $sql = "SELECT * FROM users WHERE (username='".$username."' OR email='".$username."') AND password='".$password."' ";
    $result = $conn->query($sql);
    if ( $result-> num_rows > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        echo "success";
    } else {
        echo "error";
    }

    $conn->close();

}


?>