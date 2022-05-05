<?php
session_start();
if ( isset($_SESSION) && !empty($_SESSION) )
{
include('class/_insert.php');

$insert = new insert();

$file=$_POST['upload'];
$insert->insert_content_img($file);
}
else
{
echo "You need to login";	
}
?>