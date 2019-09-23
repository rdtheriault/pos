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
        <?php
            include('../_private/VerifyDB.php');
            //echo $_POST['totalTypes'];
            echo "<br>";
            $types = $_POST['totalTypes'] + 1;//add extra one for - for loop
            //$date;
            
            for ($i = 1; $i < $types; $i++)
            {
            	$ID = "id".$i;
            	$ID =  $_POST[$ID];
            	$item = "item".$i;
            	$item = $_POST[$item];
            	$price = "price".$i;
            	$price = $_POST[$price];
            	$quant = "total".$i;
            	$quant = $_POST[$quant];
            	
            	
            	if ($quant != 0)
            	{
	            	$sql = "INSERT INTO ItemsSold (user, item, price, itemID, quant) VALUES ( ".$_SESSION['UserID'].", '".$item."', '".$price."', ".$ID.", ".$quant." )";
			$result = mysqli_query($dbc,$sql);
            		//echo $sql;
            		echo $quant.' '.$item.' sold<br>';
            	}
            }
            
            
        ?>
      </div>
        
       
	<a href="sell.php" style="font-size:30px">Sell some more</a>
	
    </body>
</html>
