<?php
require_once '_classes-cars.php';
$reg_user = new USER();


if(isset($_POST['btn-submit']))
{

 $sellerFname 	= trim($_POST['txtfname']);
 $sellerLname 	= trim($_POST['txtlname']);
 $address 		= trim($_POST['txtaddress']);
 $city		 	= trim($_POST['txtcity']);
 $phoneNumber 	= trim($_POST['txtphone']);
 $email 		= trim($_POST['txtemail']);
 $vehicleMake	= trim($_POST['txtmake']);
 $vehicleModel	= trim($_POST['txtmodel']);
 $vehicleYear 	= trim($_POST['sltyear']);
 
$reg_user->insertCars($sellerFname,$sellerLname,$address,$city,$phoneNumber, $email, $vehicleMake, $vehicleModel,$vehicleYear);
}

header('Location: display.php');   
?>