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
  	<div data-role="header" id="heading">Your Cart</div>
    <div data-role="content" id="header">
    	 <div data-role="main" class="ui-content">

   <div id="one" class="ui-body-d ui-content">
    <ul data-role="listview" data-split-icon="delete" data-filter="true" id="idListView" data-theme="a" data-split-theme="b" data-inset="true" >
      	
      </ul>
  </div>
<div data-role="popup" id="sterge" data-theme="d" data-overlay-theme="b" class="ui-content" style="max-width:340px; padding-bottom:2em;">
        	<h3>Delete product?</h3>
        <p>Do you want to remove this product from the list?</p>
        <input id="delButton" data-inline="true" data-mini="true" data-icon="check" type="button" value="Delete!" />
        <input id="giveupButton" data-inline="true" data-mini="true" data-icon="delete" type="button" value="No" />
    </div>
    	<script>
    	var i=1;
<?php

    // $img=$_SESSION['image_desc'];
// $name=$_SESSION['pro_name'];
// $type=$_SESSION['pro_type'];
// $desc=$_SESSION['pro_desc'];
// $cat=$_SESSION['pro_cat'];
// $price=$_SESSION['pro_price'];
// $id=$_SESSION['pro_id'];
// $quant=$_SESSION['quant'];
$uid=$_SESSION['user_id'];




$result = $mysqli->query("SELECT p.product_id,p.product_name,p.image_desc,p.product_desc,p.product_price,c.product_id,c.user_id,u.id FROM products p join cart c on (c.product_id=p.product_id) inner join users u on (u.id=c.user_id) WHERE user_id='$uid'") or die($mysqli->error);

if ( $result->num_rows > 0 ) {
    
   while($row = $result->fetch_assoc()) {?>
	 	var img="<?php echo $row["image_desc"];?>"+".jpg";
		 var name="<?php echo $row["product_name"];?>";
		var desc="<?php echo $desc=$row["product_desc"];?>";
	
 
     $("#one ul").append('<li id="'+i+'" class="ui-li-has-thumb"><a href="#" class="ui-btn ui-btn-icon-right ui-icon-carat-r">' +
                        '<img src="img/' + img + '" style="height: 80px;width: 80px;"/>' +
                        '<h2>' + name + '</h2>' +
                        '<p>' + desc + '</p>' +
                        '</a>' + '<a class="del" href="#">Delete</a>'+
                        '</li >');
                        $('#one ul').listview().listview('refresh');
                        i=i+1;
 <?php }
?>        
        $('#one ul').listview('refresh');

<?php 
}
    

    else {
        $_SESSION['message'] = 'Some error!';
        header("location: error.php");
    }


?>

$(document.body).on('click', '.del' ,function(){
    // li = $(this).first("li");
    li = $(this).parent();
    // alert(li.attr("id"));
    $('#sterge').popup("open");
});

$(document.body).on('click', '#delButton' ,function(){
    
    li.remove();
    $('#sterge').popup("close");
});

$(document.body).on('click', '#giveupButton' ,function(){
    $('#sterge').popup("close");
});

   </script>
   <a href="welcome.php" class="ui-btn ui-btn-inline ui-corner-all">Home</a>
<a href="logout.php" name="cart" class="ui-btn ui-btn-inline ui-corner-all">Log Out</a>
</div>
</div>
</div>
</body>
</html>