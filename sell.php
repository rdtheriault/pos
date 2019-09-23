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
        
        <style>
body {

    //transform: scale(1.1);
    //transform-origin: 10% 10%;

}


<?php   //get the count of all items to be used for creating scripts
	$cnt = 0;
	include('../_private/VerifyDB.php');
	$sql = "SELECT * FROM ItemsSold WHERE user='".$_SESSION['UserID']."'";
	$result = mysqli_query($dbc,$sql); 
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{			
		$cnt++;
	}
?>  


</style>
        
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 
 <script>
$(document).ready(function(){

  $("#elemRead").click(function(){
	$("#elemReadD").show();
        $("#elemMathD").hide();
	//var elm = $("#elemReadD");
	//elm.css("visibility","");
  });

  
  function hideSearchType(current){
        if (current !== 'standards') { $("#grades").hide();}
        if (current !== 'keywords') { $("#keyword").hide();}
        if (current !== 'authors') { $("#author").hide();}
        if (current !== 'lessons') { $("#lesson").hide();}
  }
  
  $("#searchType").change(function(){
        var val = $("#searchType input[type='radio']:checked").val();
	if (val === 'standards') { $("#grades").show(); hideSearchType(val);}
        if (val === 'keywords') { $("#keyword").show(); hideSearchType(val);}
        if (val === 'authors') { $("#author").show(); hideSearchType(val);}
        if (val === 'lessons') { $("#lesson").show(); hideSearchType(val);}   
  });
  
  
 
  
  $("#elemMath").click(function(){
	$("#elemReadD").hide();
        $("#elemMathD").show();
  });


  //$("#add1").click(function(){

	//var quant = $("#quant1").val();
	//var quant = $("#quant1").text();
	//var total = $("#total").text();
	//var price = $("#price1").val();
//window.alert(price);
	//total = parseInt(price) + parseInt(total);
        //$("#total").val(total);
        //$("#total" ).html(total);
        //quant = parseInt(quant) + parseInt("1");
//window.alert(quant);
        //$("#quant1").val(quant);
        //$("#quant1" ).html(quant);

 
  //});

 
/*
This code allows for the strands and urls to only select active inputs (thus not allowing multiple selections before submitting)
It does so by checking what is active then moving that data into hidden inputs. 
It is also necissary to not use a submit button and just submit at the end of the code
*/
$("#btn2").click(function(){
    //set array to hold all strands
    var type = $("#totalTypesID" ).val();
    var types = parseInt(type) + parseInt("1");//add extra one for - for loop 
    var i;

    // loop through strand "selects" to see which one is visible                         
    for (i = 1; i < types; i++){
    	var quant = $("#quant"+i).text();
    	$("#hid"+i ).val(quant);

    }

    //var standard = strand + standards; //combine strand and substrand to one standard

    
    $("#process").submit();//submit for as the buttons sole function is to run this script
});

});
</script>       
        
        
        
    </head>
    <body>
        
        <?php
            require('../_private/VerifyUser.php');
        ?>
        
      <div style="text-align:center;border-color:white;border:2px solid;padding:10px;min-width:500px;" >
        <p style="font-size:25px">HHS Sales</p>
        
        <table style="min-width:500px;" ><tr  >
        <td>
	        <form>
			<?php
				echo "<table><tr>";
				include('../_private/VerifyDB.php');
				$inc=1;
				$count=0;
				$sql = "SELECT * FROM ItemPrice WHERE user='".$_SESSION['UserID']."'";
				$result = mysqli_query($dbc,$sql); 
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
					if ($count == 3) {echo "</tr><tr>"; $count=0; }
				
					echo '<td><input type="button" id="add'.$inc.'" style="height:30px;margin-bottom:5px;" value="'.$row['item'].'"> <input type="hidden" value="'.$row['price'].'" id="price'.$inc.'"></td>';
					$inc = $inc+1; 
				    
				    	$count++;
				}
				echo "</tr></table>";
			?>  
	        
	        
	        </form>
	</td>
	
	<td style="min-width:250px; border:1 solid black;" >
		<form>
			<?php
				$inc2=1;
				$sql2 = "SELECT * FROM ItemPrice WHERE user='".$_SESSION['UserID']."'";
				$result2 = mysqli_query($dbc,$sql2); 
				while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC))
				{
					echo '<div id="show'.$inc2.'" style="display:none;">';
					//Write javascript for each button
					echo " <script type='text/javascript'> ";
						echo ' $("#add'.$inc2.'").click(function(){ ';
	
						echo ' var quant = $("#quant'.$inc2.'").text(); ';
						echo ' var total = $("#total").text(); ';
						echo ' var price = $("#price'.$inc2.'").val(); ';
						echo 'total = parseFloat(price) + parseFloat(total);';
						echo 'total = parseFloat(total).toFixed(2);';
						echo '$("#total").val(total);';
						echo ' $("#total" ).html(total); ';
						echo 'quant = parseInt(quant) + parseInt("1");';
						//window.alert(quant);
						echo '$("#quant'.$inc2.'").html(quant);';
						//$("#quant1" ).val(quant);
						
						
						//this part is used to activate items as they are added
					echo '
							$("#show'.$inc2.'").show();
					';
						
						
						
						
						 
						echo "});";
					echo "</script>";
					
				 
				 
				 	//add the visual for showing quanity on the screen
					echo '<div>'.$row2['item'].'  $'.$row2['price'].'  Quantity = </div><div id="quant'.$inc2.'" value="0">0</div>';
					 
				    
				    	
				    	
				    	
				    	//add the clear button for each item with the script
				    	echo '<input type="button" id="clear'.$inc2.'" value="Clear"> 
				    	<script type="text/javascript">  
				    		$("#clear'.$inc2.'").click(function(){
				    		var quant = $("#quant'.$inc2.'").text();
				    		var total = $("#total").text();
				    		var price = $("#price'.$inc2.'").val();
				    		
				    		total = parseFloat(total) - (parseFloat(quant) * parseFloat(price));
				    		total = parseFloat(total).toFixed(2);
				    		$("#quant'.$inc2.'").html("0");	
				    		$("#total" ).html(total);
				    		
				    		});
				    	</script>';
				    	
				    	
				    	$inc2 = $inc2+1;
				    	
				    	
				    	echo '</div>';
				    	
				    	
				}
			?>
	        </form>
        </td>
        </tr></table>
        
        
        Total <div id="total" value="0">0</div>
        
        <form id="process" action="sold.php" method="post">
        
        	<?php
        
			$inc3=1;
			$sql3 = "SELECT * FROM ItemPrice WHERE user='".$_SESSION['UserID']."'";
			$result3 = mysqli_query($dbc,$sql3); 
			while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC))
			{
        		
        			echo '<input type="hidden" value="" id="hid'.$inc3.'" name="total'.$inc3.'">';
        			echo '<input type="hidden" value="'.$row3['id'].'" name="id'.$inc3.'">';
        			echo '<input type="hidden" value="'.$row3['item'].'" name="item'.$inc3.'">';
        			echo '<input type="hidden" value="'.$row3['price'].'" name="price'.$inc3.'">';
        		
        		
        		
        			$inc3++;
        		
        		
        		}
        
        		$types = $inc3 - 1;
        		echo '<input type="hidden" value="'.$types.'" id="totalTypesID" name="totalTypes">';

        	?>
        	
        	<input type="button" id="btn2" value="Process Purchase">
        </form>

      </div>
        
       

    </body>
</html>
