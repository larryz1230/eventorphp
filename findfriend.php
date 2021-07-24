<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $email = $_POST['email'];

    require_once 'connect.php';

    $sql = "SELECT * FROM users WHERE email='$email' ";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['login'] = array();
    
    if ( mysqli_num_rows($response) === 1 ) {
        
        $row = mysqli_fetch_assoc($response);

        
       $index['fname'] = $row['fname'];
        $index['lname'] = $row['lname'];
        $index['email'] = $row['email'];
        $index['id'] = $row['id'];



        array_push($result['login'], $index);

        $result['success'] = "1";
        $result['message'] = "success";
        echo json_encode($result);

        mysqli_close($conn);

    }

}

?>