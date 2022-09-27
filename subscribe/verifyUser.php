<?php
if(isset($_GET['email']) && isset($_GET['code']))
{
    require "sqlObjects/user.php";
	require "functions/functions.php";
	if(check_characters($_GET['email']) || !validate($_GET['email']) || check_characters($_GET['code']))
	{
		require "header/to404.php";
	}
	else
	{

	$email=$_GET['email'];
	$result = find_userByEmail($email);
    if($result==false)
    {
        require "header/to404.php";
    }
    else
    {
        $code = $_GET['code'];
        if($result[2] == $code || $result[2] == 1)
        {	//verify user
            $verify = verifyUser($email);
            $_SESSION['subscription'] = "subscribedtoZeekUsers";
            echo"<script>
                     displaySubscribeMdl('successMdl');
                </script>";

        }
        else
        {
            require "header/to404.php";
        }
    }

}
}
else if(isset($_GET['email']) && isset($_GET['unSubCode']))
{
      require "sqlObjects/user.php";
	require "functions/functions.php";
	if(check_characters($_GET['email']) || !validate($_GET['email']))
	{
		require "header/to404.php";
	}
	else
	{
	    	$email=$_GET['email'];
	        $result = find_userByEmail($email);
            if($result==false)
            {
                require "header/to404.php";
            }
            else
            {
               $code = $_GET['unSubCode']; 
               $id = decrypt($code);
               if($result[0]==$id)
               {
                  if(deleteUser($email))
                  {
                      echo"
                      <script>
                            document.getElementById('unSubMdl').style.display='block';
                      </script>";
                  }
               }
               else
               {
                  require "header/to404.php"; 
               }
            }
	}
    
}
?>