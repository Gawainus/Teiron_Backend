<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-6">
    <title>Teiron Coupon DataBase</title>
</head>
    
<body>
<?php

if(!isset($_POST['YunziSN'])) {
	echo 'invalid YunziSN';
	exit();
}

$target = $_POST['YunziSN'];

$user = 'root';
$password = 'root';
$db = 'mysql';
$host = 'localhost';
$port = 3306;

$mysqli = new mysqli($host, $user, $password, $db);

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* If we have to retrieve large amount of data we use MYSQLI_USE_RESULT */
if ($result = $mysqli->query("SELECT * FROM Coupons WHERE YunziSN = '$target'", MYSQLI_USE_RESULT)) {

	echo 'START';
	while( $row = $result->fetch_array() )
	{
		echo $row['YunziSN'] . "|" . $row['couponID'] . "|" . $row['couponTitle']. "|" .$row['couponDetails']."||";
	}
    $result->close();
}
	echo 'END';

$mysqli->close();

?>

</body>
</html>