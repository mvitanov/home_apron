<?php 
	require '../../../connectvars.php';
	
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_HOME_APRON);
	if(mysqli_connect_error()){
		echo "Failed to connect to DB: ".mysqli_connect_error();
		exit();
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT password FROM authentication WHERE `username`='$username'";

	$result = mysqli_query($dbc, $query);

	while ($row = mysqli_fetch_assoc($result)) {
		if($row['password']==$password){
			echo 'success';
		} else {
			echo 'Passwords do not match/username not found!';
		}
	}
	
?>