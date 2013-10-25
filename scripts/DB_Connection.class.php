<?php 
class DB_Connection
{
	private $server="localhost";
	private $username="root";
	private $passs="";
	private $db_name="e_book_db";
	private $db;
	
	public function __construct()
	{
		
	}
	//the method creates a connection of the database called e_shopping_db
	function connectLogin()
	{
		$db=mysql_connect($this->server,$this->username,$this->passs) or die ("Error /...Couldn't Connect");
		mysql_select_db($this->db_name) or die("Error /.....couldn't find the database");
		
		
		//$this->db=new MySQLi($this->server,$this->username,$this->passs,$this->db_name)or die("could not connect");
		
		
		return $this->db;
	}
	//the method creates a connection of the database called e_shopping_db
	function connect()
	{
		$db=mysql_connect($this->server,$this->username,$this->passs) or die ("Error /...Couldn't Connect");
		mysql_select_db($this->db_name) or die("Error /.....couldn't find the database");
		
		
		//$this->db=new MySQLi($this->server,$this->username,$this->passs,$this->db_name)or die("could not connect");
		
		
		return $this->db;
	}
}

?>