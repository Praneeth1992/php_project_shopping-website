<?php
session_start();
require 'db.php';
?>

<html>
	
	<head>
		
		
		<meta charset="utf-8" />
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

  		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" /> 
  		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
  		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> 

	</head>


<body>
  <div data-role="page" id="pageOne">
    <div data-role="header">
    <div data-role="tabs" id="tabs">
  <div data-role="navbar">
    <ul>
<li><a href="#one" id="idMenShirts" data-ajax="false">Fav Places</a></li>
<li><a href="#one" id="idWomenTops" data-ajax="false">Fav Food</a></li>
</ul>
</div>
  <div id="one" class="ui-body-d ui-content">
    <ul data-role="listview" id="idListView" data-inset="true" >
      	
      </ul>
  </div>
  
</div>
      <script>
      $(document).ready(function () {
        
        $("#idMenShirts").click(function () {
            $("#idListView").html('');
           <?php loadProductListView("men","shirt"); ?>
        });

        $("#idWomenTops").click(function () {
            $("#idListView").html('');
          <?php  loadProductListView("women","tops");  ?>
        });
        $("#idWROGN").click(function () {
            //$("#idListView").html('');
          <?php 
           $_SESSION['img_desc']="men_shirts1.jpg";
		   $_SESSION['pro_name']="WROGN";
		   $_SESSION['pro_desc']="Slim Fit Denim Shirt";
           
             ?>
        });
        $("#idPUMA").click(function () {
            $("#idListView").html('');
          <?php 
           $_SESSION['img_desc']="men_shirts2.jpg";
		   $_SESSION['pro_name']="PUMA";
		   $_SESSION['pro_desc']="Active Wear";
           
             ?>
        });
        
<?php 
        function loadProductListView($cat,$type) {?>	
        	
      <?php
      global $mysqli;
       $result = $mysqli->query("SELECT product_name,product_desc,image_desc FROM products WHERE product_category='".$cat. "' and product_type='".$type. "' ") or die($mysqli->error);

if ( $result->num_rows > 0 ) {
	
	 while($row = $result->fetch_assoc()) {?>
	 	var img="<?php echo $row["image_desc"];?>"+".jpg";
		 var name="<?php echo $row["product_name"];?>";
		var desc="<?php echo $desc=$row["product_desc"];?>";
	    var id= "id"+"<?php echo $row["product_name"];?>";
 
     $("#one ul").append('<li class="ui-li-has-thumb"><a href="pro_desc.php" class="ui-btn ui-btn-icon-right ui-icon-carat-r" id="'+id+'">' +
                        '<img src="img/' + img + '" style="height: 80px;width: 80px;"/>' +
                        '<h2>' + name + '</h2>' +
                        '<p>' + desc + '</p>' +
                        '</a>' +
                        '</li >');
  
        
        $('#one ul').listview('refresh');


<?php } }}?>
       });
	
  </script>
</body>
</html>   