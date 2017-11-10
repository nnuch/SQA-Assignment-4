<!DOCTYPE html>
<html>
<!--<HEADER> -->
<head>
	<title>Display Information</title>
	<link href="content/css/style.css" rel="stylesheet" media="screen"/>
	<link href="content/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	<link href="content/css/bootstrap-cerulean.css" rel="stylesheet" media="screen"/> 
</head>

<body background="Images/blue.png">
<?php
	include "home-nav-bar.php";
?>

<div class="container">
<br><br><br><br>
<center><h2 id="containers"> Here is your informaton! </h2></center>

 <!--<Connect Database> --> 
<?php
require_once '_classes-cars.php';
$display= new USER();

$stmt = $display->runQuery("SELECT * FROM cars ORDER BY carID DESC");
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$base_url = "http://localhost:8080/SQA-Assignment4";
$url =($base_url);

?>

	<!--<DISPLAY> -->
	<div class="well well-lg">
		<div class="panel-heading">
			<div class="panel-body">

				<table class="table table-bordered table-responsive">						
					<tr>
						<td>Seller name:</td>
						<td><strong><?php echo $row['sellerFname']," ", $row['sellerLname']; ?></strong></td>
					</tr>
					<tr>
						<td>Address: 		</td>
						<td><strong><?php echo $row['address']; ?></strong></td>	
					</tr>
					<tr>
						<td>City: 			</td>
						<td><strong><?php echo $row['city']; ?></strong></td>
					</tr>
					<tr>
						<td>Phone number: 	</td>
						<td id="displayPhone"><strong><?php echo $row['phoneNumber']; ?></strong>	</td>
					</tr>
					<tr>
						<td>Email Address: 	</td>
						<td><strong><?php echo $row['email']; ?></strong>	</td>
					</tr>
					<tr>
				
						<td>Vehicle Make: 	</td>
						<td><strong><?php echo $row['vehicleMake']; ?></strong></td>
					</tr>
					<tr>
						<td>Vehicle Model: 	</td>
						<td><strong><?php echo $row['vehicleModel']," ", $row['vehicleYear']; ?></strong></td>
					</tr>
					<tr>
						<td>URL  :</td>
						<td id="URL" ><strong><h4><a href= "#"><?php echo $url,'/',$row['vehicleMake'],'/',$row['vehicleModel'],"/", $row['vehicleYear']; ?></a></h4></strong></td>
					</tr>
				</table>
			</div>
		</div> 
	 </div>  
 </div> 
  
<!--<FOOTER>-->
	<footer>
	<?php
		include "footer.php";
	?>
	</footer> 	  

    <script src="content/js/jquery-1.9.1.min.js"></script>
    <script src="content/js/bootstrap.min.js"></script>
	<script src="content/js/formValidation.js"></script> 
</body>
</html>