<?php  
$user=$_POST["user"];
$msg=$_POST["msg"];
$date=date("Y-m-d H:i:s");
echo $user;
echo $date;
$connect=mysql_connect("localhost","root","") or die("couldn't connect");
	mysql_select_db("ds") or die("can not find db");

$query=mysql_query("INSERT INTO dst (date1) VALUES ('$date')");
if($query)
	echo "every thing is fine";
else
	echo "something's not right";

?>