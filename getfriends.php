<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $email = $_POST['email'];

    require_once 'connect.php';

    $sql = "SELECT * FROM friends WHERE email1='$email' ";

    $res = mysqli_query($conn, $sql);

    $result = array();
    $result['getusers'] = array();


    while($row = mysqli_fetch_array($res)){
        // array_push($result['getusers'],array('email' => $row[3]));
        array_push($result['getusers'],array('email' => $row[3], 'id' => $row[1], 'fname' => $row[6], 'lname' => $row[7]));
    }

    if (mysqli_query($conn, $sql)) {

        $result["success"] = "1";
        $result ["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);

    } else {

        $result["success"] = "0";
        $result ["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
    }


}

?>