<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>

<body>

<?php

$target = $_POST['selectedYunziSN'];

$server = '192.168.180.1';
$dbName = 'HandsApp';
$user = 'app';
$password = 'Hands_1234';

$connectioninfo = array("database"=>$dbName,"UID"=>$user,"PWD"=>$password,"ReturnDatesAsStrings"=>true, "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($server,$connectioninfo) or die("無法連線到資料庫!");

$update =
    "UPDATE couponsTest
      SET CouponID='0000-0000', CouponTitle='0000-0000',
      CouponDetails='0000-0000',
      StartTime='',
      EndTime=''
      WHERE YunziSN='$target'";

$result = sqlsrv_query($con, $update);
if (!$result) {
  print("SQL statement failed with error:\n");
  exit();
}
else {
  sqlsrv_close($con);
  echo "Deleted!";
}
echo "<form action='couponGateway.html' method='get'>";
echo "<input type='submit' value='Back to Gateway' /><br />";
echo "</form>";

?>
</body>
</html>