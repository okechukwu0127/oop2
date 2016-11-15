<?php

 include_once('class.db_connect.inc.php');
class User extends DB_Connect
{
	
	

	public function __construct()
	{
		parent:: __construct();
		
	}
	
	
	public function getCurrentUri()
	{
		$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
		$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
		if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
		$uri = '/' . trim($uri, '/');
		return $uri;
	}
	
	
	public function user_insert($title_,$first_name_,$last_name_,$phone_,$number_)
	{
		
		$result=mysql_query('INSERT INTO users (id,name,school,phone,email,number_) VALUES ("","'.$title_.'","'.$first_name_.'","'.$last_name_.'","'.$phone_.'","'.$number_.'");') or die(mysql_error());
		return $result;
	}
	
	
	public function update_insert($id,$title_,$first_name_,$last_name_,$phone_,$number_)
	{
	$result=mysql_query("UPDATE users set 
										name='".$title_."',
										school='".$first_name_."',
										phone='".$last_name_."',
										email='".$phone_."',
										  number_='".$number_."' 
						where id  =  '".$id."' ")	or die(mysql_error());
		
	return $result;
	}
	
	
	
	public function select()
	 {
	  $res=mysql_query("SELECT * FROM users order by id desc");
	  return $res;
	 }
	 
	 public function select_single($id)
	 {
	  $res=mysql_query("SELECT * FROM users where id='$id' order by id desc");
	  return $res;
	 }
	 
	  public function delete_single($id)
	 {
	  $res=mysql_query("Delete FROM users where id='$id'");
	  return $res;
	 }

	
	
}







?>