<?php
	//$firstName = $_POST['firstName'];
	//$lastName = $_POST['lastName'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
	//$number = $_POST['number'];

	// Database connection
    $host = "localhost";
    $dbname = "test_db";
    $username = "root";
    $password = "";
	
    $conn = new mysqli($host,$username,$password,$dbname);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}
	$sql = "INSERT INTO customer (username, password, email) values (?, ?, ?)";
	//} else {
		
	$stmt = mysqli_stmt_init($conn);
	//$conn->prepare("insert into customer(username, password, email) values(?, ?, ?)");
	if ( ! mysqli_stmt_prepare($stmt, $sql)) {
		die (mysqli_error($conn));
	}	

	mysqli_stmt_bind_param($stmt, "ssssi", $username, $password, $email);

	mysqli_stmt_execute($stmt);

	echo "You are now registered!";
	//$stmt->bind_param("sssssi", $username, $password, $email);
		//$execval = $stmt->execute();
		//echo $execval;
		//echo "Registration successfully...";
		//die("Registration successfully...");
		//$stmt->close();
		//$conn->close();
	
?>