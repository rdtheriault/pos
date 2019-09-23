<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <link href="../hsd.css" rel="stylesheet" type="text/css" />
        
        
        
    </head>
    <body>


        <br><br><br><br>
        <form action="login.php" method="POST" id="form1">
	<p style="text-align:center">User: <input type="text" name="user"></p>
        <p style="text-align:center">Password: <input type="password" name="pw"></p>
        <input type="hidden" value="pwposa" name="pw">    
        <p style="text-align:center;"><input type="submit" value="Login"></p>
            
        </form>
        
        <?php
        
        if ($_SERVER['REQUEST_METHOD'] != 'POST')
        {
            Echo "Enter user name and enter password";
        }
        else
        {
            if($_POST['pwa'] == "pwpos")
            {
                if($_POST['pw'] == "")
                {
                    echo "Enter a password.";
                }
                else
                {
                	//$test = mysqli_real_escape_string($dbc, $_POST['user']);
                	//echo $_POST['user'];
                	include('../_private/verifyDB.php');
			include('../_private/userLogin.php');    
                }
            }
            else
            {
                Echo "Enter user name and enter password";
            }
        }   
        
        ?>
        
        
        
    </body>
</html>
