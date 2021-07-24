<?php
	
if ($_SERVER['REQUEST_METHOD']== 'POST'){

	$fname = $_POST['fname'];
	$email = $_POST ['email'];
	$password = $_POST ['password'];
	$lname = $_POST ['lname'];


	$password = password_hash($password, PASSWORD_DEFAULT);

	require_once 'connect.php';

	$sql = "INSERT INTO users(fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";

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