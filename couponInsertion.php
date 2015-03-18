<html>
<body>

<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$db = 'mysql';
$port = 3306;

// Create connection
$connection = new mysqli($host, $user, $password, $db);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connnection->connect_error);
}
echo 'connnection established<br />';
echo 'You entered the following coupon:<br />';

$YunziSN = $_POST["YunziSN"];
$CouponID = $_POST["CouponID"];
$CouponTitle = $_POST["CouponTitle"];
$CouponDetails = $_POST["CouponDetails"];

echo "{$YunziSN}<br />";
echo "{$CouponID}<br />";
echo "{$CouponTitle}<br />";
echo "{$CouponDetails}<br />";


$sql = "INSERT INTO Coupons" . "(YunziSN, CouponID, CouponTitle, CouponDetails)" .
"VALUES ('$YunziSN', '$CouponID', '$CouponTitle', '$CouponDetails' )";

echo 'inserted established';

if ($connection->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>




</body>
</html>
