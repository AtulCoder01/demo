<?php
// include database
require_once('db.php');

if( isset( $_POST ) ){

    $username = $conn->real_escape_string( $_POST['username'] );
    $email = $conn->real_escape_string( $_POST['email'] );
    $npassword = $conn->real_escape_string( $_POST['npassword'] );

    $sql = "UPDATE users SET `password`='".$npassword."' WHERE username='".$username."' AND email='".$email."' ";

    $conn->query($sql);

    if ( $conn->affected_rows > 0) {
        echo "success";
    } else {
        echo "error";
    }

    $conn->close();

}


?>