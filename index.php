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
$acces = array('affichage','login','logout');
if (isset($_GET['page']))
{
	if (in_array($_GET['page'], $acces))
		$page = $_GET['page'];
}
$acces_traitement = array('affichage'=>'messages','login'=>'users','logout'=>'users');
if (array_key_exists($page, $acces_traitement))
	require('apps/traitement_'.$acces_traitement[$page].'.php');
if (isset($_GET['ajax']))
{
	$access_ajax = ['ls_messages'];
	if (in_array($_GET['page'], $access_ajax))
	{
		$pageAjax = $_GET['page'];
		require('apps/'.$pageAjax.'.php');
	}
}
else
	require('apps/skel.php');
?>