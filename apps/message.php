<?php
$manager = new MessageManager($link);
$message_list = $manager->getAll();
$i = 0;
while ($i < sizeof($message_list))
{
	$message = $message_list[$i];
	require('views/message.phtml');
	$i++;
}
?>