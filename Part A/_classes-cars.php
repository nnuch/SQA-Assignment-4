<?php
require_once '_dbconfig.php';

class USER
{ 
	private $conn;
	//create instance 
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
	}
	//run query- connect and prepare query
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
	return $stmt;
	}
	//insert here
	public function insertCars($sellerFname,$sellerLname,$address,$city,$phoneNumber, $email, $vehicleMake, $vehicleModel,$vehicleYear)
	{
		try
		{       

			$stmt = $this->conn->prepare("INSERT INTO cars(sellerFname,sellerLname,address,city, phoneNumber, email, vehicleMake,vehicleModel,vehicleYear) 
										VALUES(:seller_fname, :seller_lname, :s_address, :s_city, :s_phone, :s_email, :sv_make, :sv_model, :sv_year)");
			$stmt->bindparam(":seller_fname",$sellerFname);
			$stmt->bindparam(":seller_lname",$sellerLname);
			$stmt->bindparam(":s_address",$address);
			$stmt->bindparam(":s_city",$city);
			$stmt->bindparam(":s_phone",$phoneNumber);
			$stmt->bindparam(":s_email",$email);
			$stmt->bindparam(":sv_make",$vehicleMake);
			$stmt->bindparam(":sv_model",$vehicleModel);
			$stmt->bindparam(":sv_year",$vehicleYear);
			$stmt->execute(); 
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
}
?>
