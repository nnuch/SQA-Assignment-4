<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link href="content/css/style.css" rel="stylesheet" media="screen"/>
	<link href="content/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	<link href="content/css/bootstrap-cerulean.css" rel="stylesheet" media="screen"/> 	
	<link href="content/css/bootstrap-social.css" rel="stylesheet" media="screen"/> 
	<link href="content/css/font-awesome.css" rel="stylesheet" media="screen"/>  	
</head>

<body background="Images/gray3.jpg">
<?php
		include "home-nav-bar.php";
?>

<div class="container">
<br><br><br><br>

	<img border="0" alt="" src="Images/usedcar.png"  width="30%" height="30%">
	<img border="0" alt="" src="Images/new-home-banner-cars.png"  width="50%" height="50%">
	
	<p>
	<?php
	require_once '_classes-cars.php';
	$car_search = new USER();

	$stmt = $car_search->runQuery("SELECT * FROM cars ORDER BY carID DESC");
	$stmt->execute();

	 if($stmt->rowCount() > 0)
	 {
	  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	  {
	   extract($row);
	?>

<!-- DISPLAY lastInsertID -->
	<div class="container">
	<div class="col-xs-12">
	   <div class="panel panel-default">
		<div class="panel-body">
		
			<h5>
			<p class="text-success">Contact Information</p>
			<br>
				Seller name : 	<strong><?php echo "  ",$row['sellerFname']," ", $row['sellerLname']; ?></strong><br>
				Address : 		<strong><?php echo "  ",$row['address']; ?></strong>	<br>
				City : 			<strong><?php echo "  ",$row['city']; ?></strong>	<br>
				Phone number : 	<strong><?php echo "  ",$row['phoneNumber']; ?></strong>	<br>
				Email Address : <strong><?php echo "  ",$row['email']; ?></strong>	<br>
				<hr>
				Vehicle Make : 	<strong><?php echo "  ",$row['vehicleMake']; ?></strong>	<br>
				Vehicle Model: 	<strong><?php echo "  ",$row['vehicleModel']," ", $row['vehicleYear']; ?></strong><br>
			</p>
			</h5>
		</div>  
		</div>  
	</div>       
	</div>

	<?php
	  }
	  } 
	 else
	 {
	  ?>
		<div class="col-xs-12">
			<div class="alert alert-warning">
			<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
			</div>
		</div>
	<?php
	 }
	?>
</div>
</div>	

	<!-- footer -->
	<footer>
	<?php
		include "footer.php";
	?>
	</footer>

    <script src="content/js/jquery-1.9.1.min.js"></script>
    <script src="content/js/bootstrap.min.js"></script>
</body>
</html>