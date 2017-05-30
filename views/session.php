<?php
session_start();
session_name('abc');
$id = session_id();
if(isset($_SESSION['key']))
{
	echo $_SESSION['key'];
}else
{
	echo"Not found ";
}
$_SESSION['key'] = 1;


?>