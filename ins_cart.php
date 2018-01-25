<?php
session_start();
require 'db.php';
?>


<html>
	
	<head>
		
		<meta charset="utf-8" />
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery-1.11.3.min.js"></script>
	
	<script src="jquery.mobile-1.4.5/jquery.mobile-1.4.5.js"></script>
		
	</head>

<body>
  <div data-theme="a" data-role="page" id="pageTwo">
    <div data-role="content" id="header">
    	 <div data-role="main" class="ui-content">

   <div id="one" class="ui-body-d ui-content">
    <ul data-role="listview" id="idListView" data-inset="true" >
      	
      </ul>
  </div>
    	<script>
<?php

    // $img=$_SESSION['image_desc'];
// $name=$_SESSION['pro_name'];
// $type=$_SESSION['pro_type'];
// $desc=$_SESSION['pro_desc'];
// $cat=$_SESSION['pro_cat'];
// $price=$_SESSION['pro_price'];
$id=$_SESSION['pro_id'];
$quant=$_SESSION['quant'];
$uid=$_SESSION['user_id'];

$quant1=$quant-1;
$sql = "INSERT INTO cart (product_id,user_id) " 
            . "VALUES ('$id','$uid')";

$sql1="UPDATE products SET quantity='$quant1' WHERE product_id='$id' ";
if ( $mysqli->query($sql) && $mysqli->query($sql1)){
$_SESSION['message'] = 'Your item has been added to cart';
        header("location: success1.php");
}
else{
	$_SESSION['message'] = 'Some error!';
        header("location: error.php");
}
   ?>
   </script>
</div>
</div>
</div>
</body>
</html>