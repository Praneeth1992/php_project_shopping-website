<?php
session_start();
require 'db.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Welcome-4You </title>
		<meta name="viewport" content="width=device-width",initial-scale=1 />
			<link rel="stylesheet" href="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery-1.11.3.min.js"></script>
	
	<script src="jquery.mobile-1.4.5/jquery.mobile-1.4.5.js"></script>
		</head>
	<body>
		<div id="pageOne" data-role="page">
		<div data-role="header" data-position="fixed">
<h1></h1>
<a href="#nav-panel" data-icon="bullets" class="ui-alt-icon" data-iconpos="notext" id="headmenu">Menu</a>
    <div data-role='control-group' data-type="horizontal" class="ui-btn-right" >
        <a href="profile.php" class="ui-btn ui-corner-all ui-icon-user ui-btn-icon-notext ui-alt-icon" id="homebut">My Account</a>           
        <a href="welcome.php" class="ui-btn ui-corner-all ui-icon-home ui-btn-icon-notext ui-alt-icon" id="homebut">Home</a>
</div>

</div>
		
    
			<?php
			$fname=$_SESSION['firstname'];
			$lname=$_SESSION['lastname'];
			$name=$fname ." " .$lname; 
			
			 ?>
				<div data-role="header">
				<h1>Welcome, <?php echo "$name"; ?></h1>	
				</div>
   
   <div data-role="main" class="ui-content">

   <div id="one" class="ui-body-d ui-content">
    <ul data-role="listview" data-filter="true" id="idListView" data-inset="true" >
      	
      </ul>
  </div>
  
   
</div>

<div data-role="panel" data-position-fixed="true" data-display="push" data-theme="b" id="nav-panel">
<div data-role="collapsible" data-iconpos="right" data-collapsed-icon="ui-nodisc-icon  ui-icon-carat-d" data-expanded-icon="ui-nodisc-icon ui-icon-carat-u" data-theme="a">
<h2>Men</h2>
<ul data-role="listview" data-filter="true" data-filter-theme="a" data-divider-theme="b">
<li><a href="#" id="idMenShirts">Shirts</a></li>
<li><a href="#" id="idMenJeans">Jeans</a></li>
<li><a href="#" id="idMenShoes">Shoes</a></li>
</ul></div>
<div data-role="collapsible"  data-iconpos="right" data-collapsed-icon="ui-nodisc-icon  ui-icon-carat-d" data-expanded-icon="ui-nodisc-icon ui-icon-carat-u" data-theme="a">
<h2>Women</h2>
<ul data-role="listview" data-filter="true" data-filter-theme="a" data-divider-theme="b">
<li><a href="#" id="idWomenTops">Tops</a></li>
<li><a href="#" id="idWomenDresses">Dresses</a></li>
<li><a href="#" id="idWomenShoes">Shoes</a></li>
</ul></div>
<div data-role="collapsible"  data-iconpos="right" data-collapsed-icon="ui-nodisc-icon  ui-icon-carat-d" data-expanded-icon="ui-nodisc-icon ui-icon-carat-u" data-theme="a">
<h2>Kids</h2>
<ul data-role="listview" data-filter="true" data-filter-theme="a" data-divider-theme="b">
<li><a href="#" id="idKidsToys">Watches</a></li>
<li><a href="#" id="idKidsUniforms">Sweaters</a></li>
<li><a href="#" id="idKidsBags">Bags</a></li>
</ul></div>

	</div>	
	
	<script>
    $(document).ready(function () {
        

        $("#idMenShirts").click(function () {
            $("#idListView").html('');
           <?php loadProductListView("men","shirt"); ?>
        });

        
        $("#idMenJeans").click(function () {
            $("#idListView").html('');
          <?php  loadProductListView("men","jeans");  ?>
        });
        
        $("#idMenShoes").click(function () {
            $("#idListView").html('');
          <?php  loadProductListView("men","shoes");  ?>
        });
        $("#idWomenTops").click(function () {
            $("#idListView").html('');
          <?php  loadProductListView("women","tops");  ?>
        });
        $("#idWomenDresses").click(function () {
            $("#idListView").html('');
          <?php  loadProductListView("women","dresses");  ?>
        });
        
        
        $("#idWomenShoes").click(function () {
            $("#idListView").html('');
          <?php  loadProductListView("women","shoes");  ?>
        });
        
        $("#idKidsToys").click(function () {
            $("#idListView").html('');
          <?php  loadProductListView("kids","watches");  ?>
        });
        
        
        $("#idKidsUniforms").click(function () {
            $("#idListView").html('');
          <?php  loadProductListView("kids","sweaters");  ?>
        });
        $("#idKidsBags").click(function () {
            $("#idListView").html('');
          <?php  loadProductListView("kids","bags");  ?>
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
	var pro_desc="<?php echo $row["image_desc"];?>"+".php";
 
     $("#one ul").append('<li class="ui-li-has-thumb"><a href="'+pro_desc+'" class="ui-btn ui-btn-icon-right ui-icon-carat-r">' +
                        '<img src="img/' + img + '" style="height: 80px;width: 80px;"/>' +
                        '<h2>' + name + '</h2>' +
                        '<p>' + desc + '</p>' +
                        '</a>' +
                        '</li >');
  
        
        $('#one ul').listview('refresh');

<?php } }}?>
       });
       
       
       $(document).on("pageinit", "#pageOne", function(){
     <?php
      global $mysqli;
       $result = $mysqli->query("SELECT product_name,product_desc,image_desc FROM products WHERE product_type='bags' ") or die($mysqli->error);

if ( $result->num_rows > 0 ) {
	
	 while($row = $result->fetch_assoc()) {?>
	 	var img="<?php echo $row["image_desc"];?>"+".jpg";
		 var name="<?php echo $row["product_name"];?>";
		var desc="<?php echo $desc=$row["product_desc"];?>";
	var pro_desc="<?php echo $row["image_desc"];?>"+".php";
 
     $("#one ul").append('<li class="ui-li-has-thumb"><a href="'+pro_desc+'" class="ui-btn ui-btn-icon-right ui-icon-carat-r">' +
                        '<img src="img/' + img + '" style="height: 80px;width: 80px;"/>' +
                        '<h2>' + name + '</h2>' +
                        '<p>' + desc + '</p>' +
                        '</a>' +
                        '</li >');
  
        
        $('#one ul').listview('refresh');

<?php } } ?>
  });

	</script>
<div data-role="footer">
        <div data-role="navbar">
            <ul>
                <li><a href="welcome.php" id="Home" >Home</a></li>
                <li><a href="cart.php" id="Cart">Cart</a></li>
            </ul>
        </div>
</body>
</html>

   