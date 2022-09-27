<?php
function findAdmin()
{
	require "connect.php";
	$sql = "SELECT * FROM tbladmin";
	$result = $conn->query($sql);
	if ($result !== false && $result->num_rows == 1) { 
		$row = $result -> fetch_row();
		return $row;
}
else
return false;
$conn->close();
}

function addAdmin($name,$email,$pass)
{
	require "connect.php";
	$sql="insert into tbladmin (Name,Email,Password) values('$name','$email','$pass')";
	$res = mysqli_query($conn, $sql);
	 if(mysqli_affected_rows($conn) == 1)
		echo"<script>alert('admin inserted')</script>;";
     else
		echo "<script>alert('failed')</script>;";
	
}
?>