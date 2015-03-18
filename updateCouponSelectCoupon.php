<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>

<body>

<?php

  if (!isset($_POST['StoreName'])) {
    echo "Not a valid store";
    exit();
  }

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
    echo "<form action='updateCoupons.php' method='post'>";
    echo "<select name='selectedYunziSN'>";
    while( $obj = sqlsrv_fetch_object( $res )) {
     echo "<option value='$obj->YunziSN'>'$obj->YunziStoreID' '$obj->CouponID' '$obj->CouponTitle' '$obj->CouponDetails'</option>";
    }
    echo "</select>";
    echo "<input type='submit' value='Select' /><br /><br />";
    
    echo "</form>";
  }
  sqlsrv_close($con); 
?>

</body>
</html>