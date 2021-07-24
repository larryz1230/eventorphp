<?php
    
if ($_SERVER['REQUEST_METHOD']== 'POST'){

    $email1 = $_POST['email1'];
    $email2 = $_POST ['email2'];
    $id1 = $_POST ['id1'];
    $id2 = $_POST ['id2'];
    $fname1 = $_POST ['fname1'];
    $lname1 = $_POST ['lname1'];
    $fname2 = $_POST ['fname2'];
    $lname2 = $_POST ['lname2'];


    require_once 'connect.php';

    $sql = "INSERT INTO friends(id1, id2, email1, email2, fname1, lname1, fname2, lname2) VALUES ('$id1', '$id2', '$email1', '$email2', '$fname1', '$lname1', '$fname2', '$lname2')";

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