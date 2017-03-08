<?php  

$connect=mysql_connect("localhost","root","") or die("couldn't connect");
	mysql_select_db("mod1") or die("can not find db");
$query = mysql_query("SELECT * FROM tms");
$numrows=mysql_num_rows($query);
if($numrows)
{
	while ($row=mysql_fetch_assoc($query)) {
		$user=$row["name"];
		$ts=$row["ts"];
		$tst=date("g:i",strtotime($ts));
		$msg=$row["msg"];
		$tst1=date("d-m-y",strtotime($ts));
		echo $tst ;
		echo "<br>";
		echo $tst1;
		echo "<br>";
		echo "the username: ".$user." time: ".$ts." msg is: ".$msg;
	}
}
else 
echo "wrong";
?>