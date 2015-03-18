<?php
include('session.php');
include('D_expired_iteminfo.php');
include('D_expired_discountinfo.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<style type="text/css">
	div
	{
		display: none;
	}
	input
	{
		width: 10em; 
		height: 2em;
		font-weight: bold;
	}
	#sub3
	{
		font-size: 40px;
	}
	
	{
		text-decoration: none;
	}
	#sub4
	{
		font-size:40px;
	}
	
	#sub5
	{
		font-size:40px;
	}
	</style>

</head>
<body>
<header>
<img class="headerimage" src="http://192.168.180.4/serverlogin/manage-top.jpg" alt="header">
</header>
<span>
<b id="welcome"><h1>歡迎 :<i><?php echo $login_session;?></i></h1></b>
<b id="logout"><a href="logout.php">登出</a></b>
</span>
<br /><br /><br /><br />
 <a href="iteminfo.php"><input type="button" name="type" id="bt1" value="新品資訊"></a>
 <a href="discountinfo.php"><input type="button" name="type" id="bt2" value="優惠資訊"></a>
 <a href="LifeProposal/index.php"><input type="button" name="type" id="bt3" value="生活資訊"></a>
 
</body>
</html>
