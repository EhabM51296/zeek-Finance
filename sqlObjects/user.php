<?php

function addUser($email,$verif,$subsDate)
{	require "connect.php";
	$sql = "INSERT INTO tblUser (Email, Verified, SubsDate)
		VALUES ('$email',$verif,'$subsDate')";
	$result = $conn->query($sql);
if ($conn -> affected_rows == 1) {
  return true;
} 
else {
  return "failed";
}

$conn->close();
}
function find_userByEmail($email)
{
	require "connect.php";
	$sql = "SELECT * FROM tblUser where `Email` = '$email'";
	$result = $conn->query($sql);
	if ($result !== false && $result->num_rows > 0) { 
		$row = $result -> fetch_row();
		return $row;
    }
    else
        return false;
$conn->close();
}
function resubscribe($email,$verif,$subsDate)
{
	require "connect.php";
	$sql = "UPDATE tblUser SET Verified = $verif, `SubsDate`='$subsDate' WHERE Email='$email'";
if ($conn->query($sql) === TRUE) {
  return true;
} 
else {
  return "failed";
}
$conn->close();
	
}
function verifyUser($email)
{
	require "connect.php";
	$sql = "UPDATE tblUser SET Verified = 1 WHERE Email='$email'";
if ($conn->query($sql) === TRUE) {
  return true;
} 
else {
  return "failed";
}
$conn->close();
	
	
}
function findVerifiedUsers()
{
	require "connect.php";
	$sql = "SELECT * FROM tblUser where `Verified` = 1";
	$result = $conn->query($sql);
	if ($result !== false && $result->num_rows >0) { 
		return $result;
	}
	else
		return false;
$conn->close();
}

function deleteUser($email)
{
	require "connect.php";
	$sql = "Delete from tblUser where `Email` = '$email'";
	$result = $conn->query($sql);
if ($conn -> affected_rows == 1) {
  return true;
} 
else {
  return "failed";
}

$conn->close();	
}

//update user's email
function updateUser($emailOld,$email)
{
	require "connect.php";
	$sql = "UPDATE tblUser SET `Email` = '$email' WHERE `Email`='$emailOld'";
if ($conn->query($sql) === TRUE) {
  return true;
} 
else {
  return "failed";
}
$conn->close();	
	
}
find_userByEmail("ehabmaatouk@outlook.com");
?>