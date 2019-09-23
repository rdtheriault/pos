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

    transform: scale(1.1);
    transform-origin: 10% 10%;

}
</style>

<?php
	
	include('../../_private/testDB.php');
	$sql = "SELECT * FROM ItemsSold WHERE user='".$_SESSION['UserID']."'";
	$result = mysqli_query($dbc,$sql); 
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{			
		echo ' '.$row['item'].' '.$row['price'].' <br>';

	}
	echo "</tr></table>";
?>  

        
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
        
   
			<?php
				
				include('../_private/dbinfo.php');
				$sql = "SELECT item, SUM(quant) Total FROM ItemsSold WHERE user='".$_SESSION['UserID']."' GROUP BY item";
				$result = mysqli_query($dbc,$sql); 
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
				{			
					echo ' '.$row['item'].' '.$row['Total'].' <br>';

				}
				echo "</tr></table>";
			?>  
	        
	        
	      

	
       
        


      </div>
        
       

    </body>
</html>
