<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body>

<?php

if (!isset($_POST['YunziSN']) or (strlen($_POST['YunziSN']) != 12) ) {
    echo "YunziSN contains 12 characters";
    exit();
}

$newYunziSN = $_POST['YunziSN'];
$target = $_POST['StoreName'];

$server = '192.168.180.1';
$dbName = 'HandsApp';
$user = 'app';
$password = 'Hands_1234';

$connectioninfo = array("database"=>$dbName,"UID"=>$user,"PWD"=>$password,"ReturnDatesAsStrings"=>true, "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($server,$connectioninfo) or die("無法連線到資料庫!");

$sql = "SELECT * FROM couponsTest WHERE StoreName='$target'";

$res = sqlsrv_query($con, $sql);
if (!$res) {
    print("SQL statement failed with error:\n");
}

else {
    $storeID='A';
    while ( $obj = sqlsrv_fetch_object($res)) {
        $storeID++;
    }

    $insertion = "INSERT INTO couponsTest
      (YunziSN, CouponID, CouponTitle, CouponDetails, StoreName, YunziStoreID, StartTime, EndTime)
      VALUES ('$newYunziSN', '0000-0000', '0000-0000', '0000-0000', '$target', '$storeID', '', '')";

    $res = sqlsrv_query($con, $insertion);
    echo "New Yunzi Added <br />";
    echo "<form action='couponGateway.html' method='get'>";
        echo "<input type='submit' value='Back to Gateway' /><br />";
    echo "</form>";
}

sqlsrv_close($con);
?>

</body>
</html>