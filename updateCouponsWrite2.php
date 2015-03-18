<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>

<body>

<?php

  if (!isset($_POST['CouponID']) or strlen($_POST['CouponID']) < 4) {
    echo "Not a valid CouponID";
    exit();
  }
  else {
    $CouponIDNeo = $_POST['CouponID'];
  }

  if (!isset($_POST['CouponTitle']) or strlen($_POST['CouponTitle']) < 4) {
    echo "Not a valid CouponTitle";
    exit();
  }
  else {
    $CouponTitleNeo = $_POST['CouponTitle'];
  }

  if (!isset($_POST['CouponDetails']) or strlen($_POST['CouponDetails']) < 4) {
    echo "Not a valid CouponDetails";
    exit();
  }
  else {
    $CouponDetailsNeo = $_POST['CouponDetails'];
  }

  if (!isset($_POST['StartTime']) or (strlen($_POST['StartTime']) != strlen("mm/dd/yyyy hh:mm:ss")) ) {
    echo "Not a valid StartTime";
    exit();
  }
  else {
    $StartTimeNeo = $_POST['StartTime'];
  }

  if (!isset($_POST['EndTime']) or (strlen($_POST['EndTime']) != strlen("mm/dd/yyyy hh:mm:ss")) ) {
    echo "Not a valid EndTime";
    exit();
  }
  else {
    $EndTimeNeo = $_POST['EndTime'];

  }
  $target = $_POST['YunziSN'];
  echo "'$target' <br />";

  $server = '192.168.180.1';
  $dbName = 'HandsApp';
  $user = 'app';
  $password = 'Hands_1234';
  
  $connectioninfo = array("database"=>$dbName,"UID"=>$user,"PWD"=>$password,"ReturnDatesAsStrings"=>true, "CharacterSet"=>"UTF-8");
  $con = sqlsrv_connect($server,$connectioninfo) or die("無法連線到資料庫!");

  $update =
      "UPDATE couponsTest
      SET CouponID='$CouponIDNeo', CouponTitle='$CouponTitleNeo',
      CouponDetails='$CouponDetailsNeo',
      StartTime='$StartTimeNeo',
      EndTime='$EndTimeNeo'
      WHERE YunziSN='$target'";

  $result = sqlsrv_query($con, $update);
  if (!$result) {
    print("SQL statement failed with error:\n");
    exit();
  }
  else {
    sqlsrv_close($con);
    echo "Updated!";
  }

  echo "<form action='couponGateway.html' method='get'>";
    echo "<input type='submit' value='Complete' /><br />";
  echo "</form>";

?>
</body>
</html>