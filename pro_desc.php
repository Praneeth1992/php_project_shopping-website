<?php

session_start();
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
  <div data-role="page" id="pageTwo">
    <div data-role="content" id="header">

      <img class="mainimg" style="width:300px;height:300px;"src="img/<?php echo $_SESSION['img_desc']; ?> " />
      <h2>Product Description</h2>
           <p>Product name:<?php echo $_SESSION['pro_name']; ?></p>
           <p>Product Type:<?php echo $_SESSION['pro_desc']; ?></p>
           <p>Product Cost:$5.00</p> 
    </div>
  </div>


</body>
</html>