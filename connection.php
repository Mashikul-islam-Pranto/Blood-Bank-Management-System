<?php
$db=new PDO('mysql:host=localhost;dbname=mypro_bbms','root','');
if($db)
{
	echo "Connect";
}
else
{
	echo "Not Connect";
}
?>