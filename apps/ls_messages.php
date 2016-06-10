<?php
$manager = new MessageManager($link);
$message_list = $manager->getAll();
$no_message = 'hide';
$messages = '';
if (empty($message_list))
{
	$no_message = '';
	$messages = 'hide';
}
require('views/ls_messages.phtml');
?>