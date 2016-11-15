<?php
session_start();
 include_once dirname(__DIR__).'/sys/class/class.user.inc.php';
 

$user= new User;
$res=$user->select();

isset($_SESSION['title'])?$_SESSION['title']=$_SESSION['title']:$_SESSION['title']='';
isset($_SESSION['school'])?$_SESSION['school']=$_SESSION['school']:$_SESSION['school']='';
isset($_SESSION['email'])?$_SESSION['email']=$_SESSION['email']:$_SESSION['email']='';
isset($_SESSION['phone'])?$_SESSION['phone']=$_SESSION['phone']:$_SESSION['phone']='';
isset($_SESSION['number_'])?$_SESSION['number_']=$_SESSION['number_']:$_SESSION['number_']='';





//$url .= $_SERVER['SERVER_NAME'];
//$url .= htmlspecialchars($_SERVER['REQUEST_URI']);
//$themeurl = dirname(dirname($url)) . "/theme";
//echo $themeurl.'<br>';
$server_dir=$user->protocol_url()
			 .$user->server_host()
			 	.'/'.$user->DIR_LOC
					.'/'.basename(__DIR__);
					
					//echo $server_dir;
?>

<html>
<head>
<link type="text/css" rel="stylesheet" href="<?=$server_dir?>/asset/css/style.css"/>
<title>Wild Fusion Development Test</title>
<body style="text-align:center;">

<?php


$base_url =$user->getCurrentUri();
$routes = array();
$routes = explode('/', $base_url);

foreach($routes as $route)
	{
		if(trim($route) != '')
		array_push($routes, $route);
	}
	
	//echo json_encode($routes);
	//var_dump($routes);
	//echo $routes[0].'---'.$routes[1].'---'.$routes[2].'---'.$routes[3].'---'.$routes[4].'---';


?>


<div class="form-2">
<h1 style="margin:30px;"> <img src="<?=$server_dir?>/asset/images/wild-fusion-logo.png"></h1>
<div class="ssubbtn" style="margin:0px; padding:10px;" 
onClick="javascript:document.location.href='<?=$server_dir."/register/";?>'">REGISTER</div>

<div class="ssubbtn" style="margin:0px; padding:10px; margin-left:20px;" 
onClick="javascript:document.location.href='<?=$server_dir."/records/";?>'">RECORDS</div>


</div>

<?php

//var_dump($row[1]);
if(isset($routes[1]) &&  $routes[1]=='record' && $routes[3]=='delete')
{
	
	if(isset($routes[5]) && $routes[5]=='yes')
	{
	//echo "--".$routes[5];	
	$user->delete_single($routes[2]);
	?>
<script>
document.location.href='<?=$server_dir."/records/";?>';
</script>
<?php
	}
	
	$data=$user->select_single($routes[2]);
$count=mysql_num_rows($data);
	
	if($count >0)
	{
		$row=mysql_fetch_row($data);
		?>
        
        <center>
        <div class="form-3" style="color:#fff; margin:10px;">DELETE RECORD</div>

		<form action="<?=$server_dir.'/record/'.$routes[2].'/'.$routes[3].'/'.$routes[4].'/yes';?>">
        <div class="legend" style="text-align:center; padding:20px; width:40%;  font-weight:normal;">
        Are you sure you want to delete <b style="color:red;"><?=$row[2]." ".$row[3];?></b> record
        <br>  <br>
        <button  class="ssubbtn" type="submit" name="" style="">YES</button>
        
         <div  class="ssubbtn" style="height:20px;" 
         onClick="javascript:document.location.href='<?=$server_dir."/records/";?>'">&nbsp;NO&nbsp;</div>
         
        </form>
        
        </center>
        
        <?php
		
		
		
	}
	else
	{
		?>
        
        <div class="legend" style="text-align:center; padding:20px;">
        <div style="font-size:12px; font-weight:normal; color:red;">
        The selected record  with id <b><?=$routes[2];?></b> is not found</div>
        
        RECORD NOT FOUND
        
        <div style="font-size:12px; font-weight:normal; color:blue; cursor:pointer;"
         onClick="javascript:document.location.href='<?=$server_dir."/records/";?>'">
        view all records
        </div>
        </div>	
	
<?php

		
	}
	
}
 
if(isset($routes[1]) &&  $routes[1]=='record' && $routes[3]=='view')
{
$data=$user->select_single($routes[2]);
$count=mysql_num_rows($data);

if($count >0)
{
$row=mysql_fetch_row($data)
?><br>
<center>
<div class="form-3" style="color:#fff; margin:10px;">USER RECORD</div>
<table style="width:30%">
<tr>
<td  width="30%" >Name</td>
<td class="legend"><?=$row[1];?></td>
</tr>
<tr>
<td   >School</td>
<td class="legend"><?=$row[2];?></td>
</tr>
<tr>
<td >Email</td>
<td class="legend"><?=$row[3];?></td>
</tr>
<tr>
<td >Phone</td>
<td class="legend"><?=$row[4];?></td>
</tr>

<td >Number of Subjects</td>
<td class="legend"><?=$row[5];?></td>
</tr>

<tr>
<td>#</td>
<td   class="legend" style="font-size:10px;">
 <a href="<?=$server_dir.'/record/'.$row[0].'/edit/'.$row[2].'-'.$row[3];?>">Edit</a>&nbsp;&nbsp;&nbsp;
  <a href="<?=$server_dir.'/record/'.$row[0].'/delete/'.$row[2].'-'.$row[3];?>">Delete</a>
 </td>
</tr>

</table>
</center>	
	
<?php
}
else
{?>

<div class="legend" style="text-align:center; padding:20px;">
<div style="font-size:12px; font-weight:normal; color:red;">
The selected record  with id <b><?=$routes[2];?></b> is not found</div>

RECORD NOT FOUND

<div style="font-size:12px; font-weight:normal; color:blue; cursor:pointer;"
 onClick="javascript:document.location.href='<?=$server_dir."/records/";?>'">
view all records
</div>
</div>	
	
<?php
}


}



//var_dump($user);
//echo $routes[1].'--------------------->>>>>>>>>';
if(isset($routes[1]) &&  $routes[1]=='records')
{
//echo $routes[0];
?>

<center>
<div class="form-3" style="color:#fff; margin:10px;">REGISTRED USERS</div>
<table>
<tr class="legend">
<th>NAME</th>
<th>SCHOOL</th>
<th>EMAIL</th>
<th>#</th>
</tr>
<?php
while($row=mysql_fetch_row($res))
{
	
	echo '<tr><td>'.$row[1].'</td>';
	echo '<td>'.$row[2].'</td>';
	echo '<td>'.$row[3].'</td>';
	
	echo '<td align="center" style="font-size:9px;">
				<a href="'.$server_dir.'/record/'.$row[0].'/view/'.$row[2].'-'.$row[3].'/">View</a>
				<a href="'.$server_dir.'/record/'.$row[0].'/edit/'.$row[2].'-'.$row[3].'/">Edit</a>
				<a href="'.$server_dir.'/record/'.$row[0].'/delete/'.$row[2].'-'.$row[3].'/">Delete</a>
				
		</td></tr>';
      
	
}
?>
</table>
</center>

<?php

}



if( (isset($routes[1]) &&  $routes[1]=='register') || (isset($routes[1]) && $routes[1]=='record' && $routes[3]=='edit')  )
{

	
if(isset($_POST['btn-save']))
{

$title=$_POST['title'];	
$school=$_POST['school'];	
$email=$_POST['email'];	
$phone=$_POST['phone'];	
$number_= $_POST['number_'];


if(empty($title))
{

// echo $routes[2].'-'.$routes[3];
 
		 if(isset($routes[2]))
		 {
			?>
			
			<script>
				document.location.href='<?=$server_dir."/register/field_error";?>';
				</script>
			
			<?php 
			 
		 }else
		 {
		 ?>
				<script>
				document.location.href='<?=$server_dir."/record/".$routes[2].'/'.$routes[3].'/field_error';?>';
				</script>
				
		 <?php
		 }
	
}
else
{
		if(isset($routes[3]))
		{
		$data=$user->update_insert($routes[2],$title,$school,$email,$phone,$number_);	
		}
		else
		{
		$data=$user->user_insert($title,$school,$email,$phone,$number_);
		}
		
		if($data)
		{?>
		<script>
		document.location.href='<?=$server_dir."/records/";?>';
		</script>
		<?php
		}
}


	
	
	
}

$data=$user->select_single($routes[2]);
$count=mysql_num_rows($data);

if((isset($routes[3])))
{
if($count >0)
{
$row=mysql_fetch_row($data);
$_SESSION['title']=$row[1];
$_SESSION['school']=$row[2];
$_SESSION['email']=$row[3];
$_SESSION['phone']=$row[4];
$_SESSION['number_']=$row[5];
	
}
else
{?>
	<div class="legend" style="text-align:center; padding:20px;">
<div style="font-size:12px; font-weight:normal; color:red;">
The selected record  with id <b><?=$routes[2];?></b> is not found</div>

RECORD NOT FOUND

<div style="font-size:12px; font-weight:normal; color:blue; cursor:pointer;"
 onClick="javascript:document.location.href='<?=$server_dir."/records/";?>'">
view all records
</div>
</div>	
    
<?php	
exit();
}
}
else
{
	
$_SESSION['title']='';
$_SESSION['school']='';
$_SESSION['email']='';
$_SESSION['phone']='';	
$_SESSION['number_']='';
}

?>
<div class="form-3" style="margin-top:10px;"><?=(isset($routes[3])?"UPDATE user record":"Register with us");?></div>

<form method="post" class="form-1" style="width:50%;">
<center>
    <table align="center" style="width:90%">
    <tr>
    <tr>
    <td colspan="2" align="center" style="color:red; font-size:12px;
    <?php
    if(isset($routes[4]))
	{
		
			if($routes[4]=='field_error')
			{
			   echo 'display:block';	
			}
			else
			{
			    echo'display:none';	
			}
		
	}else
	{
	echo'display:none';		
	}
	?>" > <?php echo $routes[4].'-'; ?>
    one or more fields were not properly filled out
    </td>
    </tr>
    <td><input type="text" name="title" placeholder="Name" 
    value="<?=isset($_SESSION['title'])?$_SESSION['title']:$_SESSION['title'];?>" /></td>
    </tr>
    <tr>
    <td><input type="text" name="school" placeholder="School"
     value="<?=isset($_SESSION['school'])?$_SESSION['school']:$_SESSION['school'];?>" /></td>
    </tr>
    <tr>
    <td><input type="text" name="phone" placeholder="Phone Number" 
    value="<?=isset($_SESSION['phone'])?$_SESSION['phone']:$_SESSION['phone'];?>" /></td>
    </tr>
    <tr>
    <td><input type="text" name="email" placeholder="Email" 
    value="<?=isset($_SESSION['email'])?$_SESSION['email']:$_SESSION['email'];?>" /></td>
    </tr>
    
    <tr>
    <td><input type="text" name="number_" placeholder="Number of Subjetcs" 
    value="<?=isset($_SESSION['number_'])?$_SESSION['number_']:$_SESSION['number_'];?>" /></td>
    </tr>
    
    <tr>
    <td>
    <button type="submit" name="btn-save" class="ssubbtn"><strong><?=(isset($routes[3])?"UPDATE":"SAVE");?></strong></button>
    
     <button  type="button"
     onClick="javascript:document.location.href='<?=$server_dir."/register/";?>'"
      id="btn_cancel"  class="ssubbtn" style="margin-top:10px; margin-bottom:10px;">
      <strong>CANCEL</strong></button></td>
    </tr>
    </table>
</form>
</center>
<?php

}
?>
</body>
</html>