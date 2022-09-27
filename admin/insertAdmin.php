<?php
if(isset($_POST['signup']))
{require "../sqlObjects/adminUser.php";

	$name = $_POST['adminName'];
	$email = $_POST['adminEmail'];
	$pass = $_POST['pass'];
	$hash = password_hash($pass, PASSWORD_DEFAULT);
	addAdmin($name,$email,$hash);
}
?>
<div>
<center>
<table>
<caption>Admin's Info</caption>
    <form method=post action="insertAdmin.php">
    <tr>
       <td>
        <input type="text" placeholder="adminName" id="adminName" name="adminName">
       </td>
    </tr>
	  <tr>
       <td>
        <input type="text" placeholder="adminEmail" id="adminEmail" name="adminEmail">
       </td>
    </tr>
    <tr>
      <td>
        <input type="password" placeholder="password" id="pass" name="pass">
      </td></tr>
      <tr>
        <td>
        <button type="submit" id="signup" name="signup">signup</button>
       </td>
       </tr>
    </form>
    </table>
    </center>
</div>