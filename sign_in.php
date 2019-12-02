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
$u_passwd = $_POST["u_passwd"]; 

$sql = "SELECT * FROM users WHERE u_name='".$u_name."' AND u_passwd='".$u_passwd."'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
        session_start();    
        while($row = $result->fetch_assoc()) {
            $_SESSION['logged_in'] = '1';
            $_SESSION['u_name'] = $row["u_name"];
            $_SESSION['u_passwd'] = $row["u_passwd"];
            $_SESSION['u_email'] = $row["u_email"];
            $_SESSION['u_role'] = $row["u_role"];
            $_SESSION['u_b_date'] = $row["u_b_date"];
            $_SESSION['u_mob_phone'] = $row["u_mob_phone"];
            $_SESSION['u_fix_phone'] = $row["u_fix_phone"];
            $_SESSION['credit_num'] = $row["credit_num"];
            $_SESSION['credit_date'] = $row["credit_date"];
            $_SESSION['credit_cvv'] = $row["credit_cvv"];
            $_SESSION['credit_type'] = $row["credit_type"];
            $_SESSION['credit_owner_name'] = $row["credit_owner_name"];
            //header('Location: admin.php');
            echo "<script type='text/javascript'>alert('Ο Χρήστης Συνδέθηκε');</script>";
            if ($_SESSION['u_role'] == 'admin') {
                $file= 'admin.php';
            } elseif ($_SESSION['u_role'] == 'adv_user') {
                $file= 'adv_user.php';
            } else {
                $file= 'user.php';
            }
            echo "<meta http-equiv='Refresh' content='1; URL=".$file."'>";
            exit;
         }
     }
    else {
        echo "<script type='text/javascript'>alert('');</script>";
        echo "<meta http-equiv='Refresh' content='0; URL=http://myhomeavm.ddns.net:15001/'>";
        exit;
     }


$conn->close();
?>