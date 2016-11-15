<?php
 
 include_once dirname(__DIR__).'/config/class.db_cred.inc.php';


class DB_Connect extends DB_Cred
{
		
		
	protected $db_server,$db;
		
		
		
	public function __construct()
	{
	
	
	
	
		$this->db_server=mysql_connect($this->DB_HOST,$this->DB_USER,$this->DB_PASS) or die(mysql_error());
		$this->db=mysql_select_db($this->DB_NAME,$this->db_server) or die(mysql_error());
		
		
		
		
	}
	
	
	
	
	
}




		 
		



?>


