<?php
class Database
{
     
    private $host = "localhost";
    private $db_name = ""; 		//your database
    private $username = ""; 	//your username 
    private $password = "";		//your password
    public $conn;
     
// Connect to the database
    public function dbConnection()
	{
		$this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        } 
        return $this->conn;
    }
		//redirect method
	public function redirect($url)
	{
		header("Location: $url");
	}
	
}
?>