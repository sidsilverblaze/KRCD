<?php  
session_start();
if(isset($_FILES['file']))
	{
		$file = $_FILES['file'];	
		$username=$_SESSION['username'];
		$email=$_SESSION['email'];
		print_r($_SESSION);
	 //file properties
		$file_name= $file['name'];
		$file_tmp=$file['tmp_name'];
		$file_size=$file['size'];
		$file_error=$file['error'];
		$file_ext=explode('.', $file_name);
		$file_ext=strtolower(end($file_ext));
		$file_name_new=$file_name.uniqid('',true) .'.'. $file_ext;
			if ($file_error===0) {
				$file_dest='uploads/'. $file_name_new;
				if (move_uploaded_file($file_tmp, $file_dest)) {
					echo " the file is stored at ".$file_dest;
					echo "click here to download <a href='$file_dest'>download</a>";	

					$con=mysqli_connect("localhost","root","") or die("couldnot connect");
					mysqli_select_db($con,'logind') or die("could not connect to db");
					mysqli_query($con,"insert into uploads (username,email,fileloc) values ('$username','$email','$file_dest')");

				}
				else
					echo "error";
			}
			else
				echo "error 1";
}

?>