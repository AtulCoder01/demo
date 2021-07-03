<?php
// include database
require_once('db.php');

if( isset( $_POST ) ){
    
    $name = $conn->real_escape_string( $_POST['name'] );
    $username = $conn->real_escape_string( $_POST['username'] );
    $email = $conn->real_escape_string( $_POST['email'] );
    $phone = $conn->real_escape_string( $_POST['phone'] );
    $password = $conn->real_escape_string( $_POST['password'] );

    $sql1 = "SELECT * FROM users WHERE username='".$username."' OR email='".$email."' ";
    $result = $conn->query($sql1);
    if ( $result->num_rows > 0) {
        echo "exist";
    }else{
        $sql = "INSERT INTO users (`name`, username, email, phone, `password`) VALUES ('$name', '$username', '$email', '$phone', '$password')";
    
        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "error";
        }
    }


    $conn->close();

}


?>