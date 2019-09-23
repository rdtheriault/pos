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
        
        <?php
            require('../_private/VerifyUser.php');
        ?>
        
      <div style="text-align:center;border-color:white;border:2px solid;padding:10px">
        <p style="font-size:25px">What do you want to do?</p>
        <a href="sell.php">Sell Items</a><br><br>
        <a href="items.php">Add Items</a><br><br>
        <a href="data.php">Get Items Sold</a><br><br>
        <a href="scripts/LogOut.php">Logout</a><br><br>
      </div>
        
       

    </body>
</html>
