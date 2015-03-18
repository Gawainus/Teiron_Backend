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

    $stepper = 0;
    echo "<form action='updateCouponsWrite.php' method='post'>";
    echo "<input type='hidden' name='StoreName' value='$target'>";
    while( $obj = sqlsrv_fetch_object( $res )) {
      echo
      "<input type='hidden' name='YunziSN$stepper' value='$obj->YunziSN'>".
      "New CouponID: <input type='text' name='CouponID$stepper'>".
      " Existing CouponID: $obj->CouponID<br />".
      "New CouponTitle: <input type='text' name='CouponTitle$stepper'>".
      " Existing CouponTitle: $obj->CouponTitle<br />".
      "New CouponDetails: <input type='text' name='CouponDetails$stepper'>".
      " Existing CouponDetails: $obj->CouponDetails<br />";

      $startTimeStr = date( 'm-d-Y H:i:s', strtotime($obj->StartTime) );
      echo
      "New StartTime: <input type='datetime-local' name='StartTime$stepper' placeholder = 'mm/dd/yyyy hh:mm:ss'>".
      " Existing StartTime: {$startTimeStr}<br />";

      $endTimeStr = date( 'm-d-Y H:i:s', strtotime($obj->EndTime) );
      echo
      "New EndTime: <input type='datetime-local' name='EndTime$stepper' placeholder='mm/dd/yyyy hh:mm:ss'>".
      " Existing EndTime: {$endTimeStr}<br /> <br />";
      $stepper++;
    }

    echo "WARNING: Selected Coupons will be updated to values you entered.<br />";
    echo "<input type='submit' name='Update' value='Update' /><br /><br />";
    echo "</form>";
  }

  sqlsrv_close($con); 
?>

</body>
</html>
