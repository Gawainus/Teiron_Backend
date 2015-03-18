<?php
$server='192.168.180.15';

$connectioninfo = array("database"=>"test","UID"=>"andy","PWD"=>"030707","ReturnDatesAsStrings"=>true,"CharacterSet"=>"UTF-8");
$link = sqlsrv_connect($server,$connectioninfo);

if(!$link) {
    die( print_r( sqlsrv_errors(), true));
	echo "die";
}else {
	echo "connect ok<br />";
	$sql = "select name, time from time";
   //$sql = "SELECT tel1,vip_code FROM VIPMF WHERE vip_code='HS00000002'";
   //$sql = "insert into asd(user_id,username,userpassword)values(null,'laurie','password')"
   $stmt = sqlsrv_query( $link, $sql );
   if( $stmt === false) {
       die( print_r( sqlsrv_errors(), true) );
     }

   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
		
		
		echo $row['name'].";".$row['time']."<br />";
       //echo $row['tel1'].";".$row['vip_code']."<br />";
          }
   }

?>