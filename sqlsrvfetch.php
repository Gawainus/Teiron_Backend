<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>

<body>

<?php
if(!isset($_POST['YunziSN'])) {
  echo 'invalid YunziSN<br />';
  exit();
}
else {
  $target = $_POST['YunziSN'];
}

$server = '192.168.180.1';
  $dbName = 'HandsApp';
  $user = 'app';
  $password = 'Hands_1234';
  
  $connectioninfo = array("database"=>$dbName,"UID"=>$user,"PWD"=>$password,"ReturnDatesAsStrings"=>true, "CharacterSet"=>"UTF-8");
  $con = sqlsrv_connect($server,$connectioninfo) or die("無法連線到資料庫!");

  $sql = "SELECT * FROM couponsTest WHERE YunziSN = '$target'";

  $res = sqlsrv_query($con, $sql);
  if (!$res) {
    print("SQL statement failed with error:\n");
  } else {

    echo'START';
    while( $obj = sqlsrv_fetch_object( $res )) {
              echo $obj->YunziSN.'|'.$obj->CouponID.'|'.$obj->CouponTitle.'|'.$obj->CouponDetails.'|'.$obj->StartTime.'|'.$obj->EndTime.'||';
        }
    echo 'END';

  }  

  sqlsrv_close($con); 
?>

</body>
</html>