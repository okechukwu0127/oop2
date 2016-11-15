<?php

class DB_Cred
{

public $DB_HOST = "localhost";

public $DB_USER = "root";

public $DB_PASS = "";

public $DB_NAME = "oop_database";


public $DIR_LOC= "oop2";


public function protocol_url()
{
	
return  isset($_SERVER['HTTPS']) ? 'https://' : 'http://';	
}


public function server_host()
{
	
return $_SERVER['HTTP_HOST'];	
}






}

?>