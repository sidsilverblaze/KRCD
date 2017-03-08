<?php  
$user=$_POST["user"];
$msg=$_POST["msg"];
$date=date("Y-m-d H:i:s");
echo $user;
echo $date;
$connect=mysql_connect("localhost","root","") or die("couldn't connect");
	mysql_select_db("mod1") or die("can not find db");

$query=mysql_query("INSERT INTO tms (name,ts,msg) VALUES ('$user','$date','$msg')");
if($query)
	echo "every thing is fine";
else
	echo "something's not right";

?>