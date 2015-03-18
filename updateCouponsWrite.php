<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>

<body>

<?php

  $targetStore = $_POST['StoreName'];

  $server = '192.168.180.1';
  $dbName = 'HandsApp';
  $user = 'app';
  $password = 'Hands_1234';
  
  $connectioninfo = array("database"=>$dbName,"UID"=>$user,"PWD"=>$password,"ReturnDatesAsStrings"=>true, "CharacterSet"=>"UTF-8");
  $con = sqlsrv_connect($server,$connectioninfo) or die("無法連線到資料庫!");

  $sql = "SELECT * FROM couponsTest WHERE StoreName='$targetStore'";

  $res = sqlsrv_query($con, $sql);
  if (!$res) {
    echo "Problem of targetStore <br />";
    die( print_r( sqlsrv_errors(), true));
  }

  else {

    $stepper = 0;
    while( $obj = sqlsrv_fetch_object( $res )) {
      $target = $_POST["YunziSN{$stepper}"];

      if (strlen($_POST["CouponID$stepper"]) > 0) {
        $CouponIDNeo = $_POST["CouponID$stepper"];

        $update =
          "UPDATE couponsTest
          SET CouponID='$CouponIDNeo'
          WHERE YunziSN='$target'";

        $result = sqlsrv_query($con, $update);
        if (!$result) {
          echo "Problem of targetYunziSN <br />";
          die( print_r( sqlsrv_errors(), true));
        }
        else {
          echo "CouponID of '$target' Updated! <br />";
        }
      }

      if (strlen($_POST["CouponTitle$stepper"]) > 0) {
        $CouponTitleNeo = $_POST["CouponTitle$stepper"];

        $update =
          "UPDATE couponsTest
          SET CouponTitle='$CouponTitleNeo'
          WHERE YunziSN='$target'";

        $result = sqlsrv_query($con, $update);
        if (!$result) {
          die( print_r( sqlsrv_errors(), true));
        }
        else {
          echo "CouponTitle of '$target' Updated! <br />";
        }
      }

      if (strlen($_POST["CouponDetails$stepper"]) > 0) {
        $CouponDetailsNeo = $_POST["CouponDetails$stepper"];

        $update =
          "UPDATE couponsTest
          SET CouponDetails='$CouponDetailsNeo'
          WHERE YunziSN='$target'";

        $result = sqlsrv_query($con, $update);
        if (!$result) {
          die( print_r( sqlsrv_errors(), true));
        }
        else {
          echo "CouponDetails of '$target' Updated! <br />";
        }
      }

      if (strlen($_POST["StartTime$stepper"]) == strlen("mm/dd/yyyy hh:mm:ss") ) {
        $StartTimeNeo = $_POST["StartTime$stepper"];

        $update =
          "UPDATE couponsTest
          SET StartTime='$StartTimeNeo'
          WHERE YunziSN='$target'";

        $result = sqlsrv_query($con, $update);
        if (!$result) {
          die( print_r( sqlsrv_errors(), true));
        }
        else {
          echo "StartTime of '$target' Updated! <br />";
        }
      }
      else {
        if (strlen($_POST["EndTime$stepper"] > 0) )
        {
          echo "Please follow the format for StartTime";
        }
      }

      if (strlen($_POST["EndTime$stepper"]) == strlen("mm/dd/yyyy hh:mm:ss") ) {
        $EndTimeNeo = $_POST["EndTime$stepper"];

        $update =
          "UPDATE couponsTest
          SET EndTime='$EndTimeNeo'
          WHERE YunziSN='$target'";

        $result = sqlsrv_query($con, $update);
        if (!$result) {
          die( print_r( sqlsrv_errors(), true));
        }
        else {
          echo "EndTime of '$target' Updated! <br />";
        }
      }
      else {
        if (strlen($_POST["EndTime$stepper"] > 0) )
        {
          echo "Please follow the format for EndTime";
        }
      }
      
      $stepper++;
    }
  }

  sqlsrv_close($con);

  echo "<form action='couponGateway.html' method='get'>";
    echo "<input type='submit' value='Complete' /><br />";
  echo "</form>";

?>
</body>
</html>