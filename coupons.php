<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-6">
    <title>Welcome to Yumen's site!</title>
</head>

<body>
    <h1>About Yumen</h1>

<?php 
echo "Hello Dick<br />";
$greetings = "hello";
$person = "beautiful";
$phrase = "{$greetings} $person";
echo $phrase;
$phrase2 = $greetings;
$phrase2 .= $person;
echo $phrase2;

$num1 = "0";
$num2 = "00";

echo empty($num1) . "<br />";
echo empty($num2) . "<br />";
echo gettype($num) . "<br />";
echo isset($num) . "<br />";
echo gettype($num2) . "<br />";

echo "end of php<br />";



?>
    
</body>
</html>