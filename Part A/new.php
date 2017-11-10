<!DOCTYPE html>
<html>
<head>
	<title>Car Information</title>
	<link href="content/css/style.css" rel="stylesheet" media="screen"/>
	<link href="content/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	<link href="content/css/bootstrap-cerulean.css" rel="stylesheet" media="screen"/> 
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body background="Images/blue.png">
<?php
		include "home-nav-bar.php";
?>
	
<div class="start-page">
<br><br><br><br>

<!--JAVASCRIPT validtion -->
	  <div class="form">	  
			<form name="myForm" id="car-form" class="mycar-form" action="_new.php" method="post" onsubmit="return validate(this);">
			 <h4>Car Information</h4>	
			 
					<input type="text" id="txtfname"  placeholder="First name" name="txtfname"required  />
					<input type="text" id="txtlname" placeholder="Last name" name="txtlname" required />
					<input type="text" id="txtaddress" placeholder="Address" name="txtaddress" required />
					<input type="text"  id="txtcity" placeholder="City" name="txtcity" required />
					<input type="text" 	id="txtphone" placeholder="Phone number ex: 123-123-1234 or (123)123-1234" name="txtphone" required />
					<input type="email" id="txtemail" placeholder="Email address" name="txtemail"required  />
					<input type="text"  id="txtmake" placeholder="Vehicle Make" name="txtmake"required  />
					<input type="text"  id="txtmodel" placeholder="Vehicle Model" name="txtmodel" required />
					
					<!-- Select here -->
					<div class="panel panel-default">
					  <div class="panel-body">
					  <div align="left">Vehicle Model Year   :  <select id="selectElementId" name="sltyear" value="i" required></select></div>
					  </div>
					</div>
					
					<!-- BUTTON SAVE -->
					<button id="myBtn"  class="btn btn-large btn-primary" type="submit" name="btn-submit">SAVE</button>
					<br><br>
			</form>
	  </div>

<!-- footer -->
	<footer>
	<?php
		include "footer.php";
	?>
	</footer>
</div>

    <script src="content/js/jquery-1.9.1.min.js"></script>
    <script src="content/js/bootstrap.min.js"></script>
	<!-- My form validation -->
	<script src="content/js/formValidation.js"></script> 
</body>
</html>