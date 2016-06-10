<?php

if(!empty($list))
{
	$count = 0;
	while ($count<sizeof($list))
	{
		$user = $list[$count];
		require('views/connecte.phtml');
		$count++;
	}
}
?>