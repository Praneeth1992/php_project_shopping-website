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
  <div  data-role="page" id="pageTwo">
    <div data-role="content" id="header">

      <img class="mainimg" style="width:300px;height:300px;"src="img/men_jeans1.jpg" />
      
      
      <h2>Product Description</h2>
           <p id="pro_name"></p>
           <p id="pro_cat"></p>
           <p id="pro_type"></p>
           <p id="pro_desc"></p>
           <p id="pro_price"></p>
           <p id="pro_quant"></p>
          

<a href="welcome.php" class="ui-btn ui-btn-inline ui-corner-all">Home</a>
<a href="ins_cart.php" name="cart" class="ui-btn ui-btn-inline ui-corner-all">Add to Cart</a>
<a href="cart.php" name="cart" class="ui-btn ui-btn-inline ui-corner-all">Go to Cart</a>
  </div>
</div>

</form>
</body>
</html>
 <?php
      global $mysqli;
       $result = $mysqli->query("SELECT product_id,product_name,product_category,product_type,product_price,product_desc,image_desc,quantity FROM products WHERE product_id=211") or die($mysqli->error);

       ?>
       <script>
var pro_id;
var pro_name;
var pro_cat;
var pro_type;
var pro_price;
var pro_desc;
var img_desc;
var quant;
var need;

<?php

if ( $result->num_rows > 0 ) {
	
	 while($row = $result->fetch_assoc()) {?>
	 	img_desc="<?php echo $row["image_desc"];?>"+".jpg";
		 pro_name="<?php echo $row["product_name"];?>";
		pro_cat="<?php echo $desc=$row["product_category"];?>";
	pro_type="<?php echo $row["product_type"];?>";
	pro_price="<?php echo $row["product_price"];?>";
	pro_desc="<?php echo $row["product_desc"];?>";
	pro_id="<?php echo $row["product_id"];?>";
	quant="<?php echo $row["quantity"];?>";
	
	
	
	
	<?php 

$_SESSION['pro_id']=$row["product_id"];
$_SESSION['quant']=$row["quantity"];
		 


}} ?>
</script>
<script>

document.getElementById("pro_name").innerHTML = "Product Name:"+pro_name;
document.getElementById("pro_cat").innerHTML = "Product Category:"+pro_cat;
document.getElementById("pro_type").innerHTML = "Product Type:"+pro_type;
document.getElementById("pro_desc").innerHTML = "Product Description:"+pro_desc;
document.getElementById("pro_price").innerHTML = "Product Price:"+pro_price;
document.getElementById("pro_quant").innerHTML = "Available Quantity:"+quant;

</script>


