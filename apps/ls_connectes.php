<?php

$manager = new UserManager($link);
$list = $manager->getByStatut(1);
$no_user = 'hide';
$users = '';
if(empty($list))
	{
		$no_user = '';
		$users = 'hide';
	}
require('views/ls_connectes.phtml');

?>