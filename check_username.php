<?php
	$servername = "localhost";
    $username = "sdy";
    $password = "sdy_2019";
    $dbname = "Quick_like_Hermes";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
	}
    //echo "Connected successfully";
	$u_name = $_POST["u_name"]; 
    
    # $u_name = 'kikirikou';
	$sql = "SELECT u_name FROM users WHERE u_name='".$u_name."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "FALSE";
     }
    else {
        echo "TRUE";
     }
    $conn->close();
?>