<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body>

<?php

$server = '192.168.180.1';
$dbName = 'HandsApp';
$user = 'app';
$password = 'Hands_1234';

$connectioninfo = array("database"=>$dbName,"UID"=>$user,"PWD"=>$password,"ReturnDatesAsStrings"=>true, "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($server,$connectioninfo) or die("無法連線到資料庫!");

$sql = "SELECT * FROM couponsTest";

$res = sqlsrv_query($con, $sql);
if (!$res) {
    print("SQL statement failed with error:\n");
} else {

    while( $obj = sqlsrv_fetch_object( $res )) {
        echo $obj->YunziSN.'<br />'.$obj->StoreName.'<br />'.$obj->CouponID.'<br />'.$obj->CouponTitle.'<br />'.$obj->CouponDetails.'<br />'.$obj->StartTime.'<br />'.$obj->EndTime.'<br />'.'<br />';
    }

}

sqlsrv_close($con);
?>

</body>
</html>