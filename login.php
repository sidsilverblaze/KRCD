<?php 
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$password=md5($password);
error_reporting(E_ALL ^ E_DEPRECATED);
if($username&&$password)
{
	$connect=mysql_connect("localhost","root","") or die("couldn't connect");
	mysql_select_db("logind") or die("can not find db");
	$query=mysql_query("select * from login where username='$username' and password='$password'");
	$numrow=mysql_num_rows($query);
	if ($numrow!=0) {
		
	}
	else
		die("no such user exist");


while ($row=mysql_fetch_assoc($query)) {
	$dbusername=$row['username'];
	$dbpassword=$row['password'];
	$demail=$row['email'];
	$dsu=$row['su'];
	//$password=md5($password);
	if($dbpassword===$password&&$dbusername===$username)
	{	$_SESSION['username']=$dbusername;
		$_SESSION['email']=$demail;
		if ($dsu==1) {
			//redirect to user page
			header("Location: http://localhost:1234/test/adminlogin.php");
			exit();

		//echo "you are welcome CLICK <a href='adminlogin.php'>HERE</a> TO download " .$demail." ".$dsu;	
		}
		else
		{	
			header("Location: http://localhost:1234/test/member.php");
		exit();
		//echo "you are welcome CLICK <a href='member.php'>HERE</a> TO upload " .$demail." ".$dsu;
	}
	
	#if($dsu==0)
	#	echo "hell nooooooo";
	}
	else 
		echo "incorrect password ".$password;
}
}		
else
die("please enter username and password"); 
?>