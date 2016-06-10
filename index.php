<?php
session_start();
$error = '';
$page = 'affichage';
function __autoload($class_name){
	require('models/'.$class_name.'.class.php');
}
require('config.php');
$link = mysqli_connect($localhost, $login, $pass, $database);
if (!$link)
{
	require('bigerror.phtml');
	exit;
}
$acces = array('affichage');
if (isset($_GET['page']))
{
	if (in_array($_GET['page'], $acces))
		$page = $_GET['page'];
}
$acces_traitement = array('affichage'=>'messages');
if (array_key_exists(($page, $acces_traitement)))
	require('apps/traitement_'.$acces_traitement[$page].'.php');
if (isset($_GET['ajax']))
{
	$access_ajax = [];
	require('apps/'.$pageAjax.'.php');
}
else
	require('apps/skel.php');
?>