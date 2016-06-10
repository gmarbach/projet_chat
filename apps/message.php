<?php
if (!empty($message_list))
{
	$i = 0;
	while ($i < sizeof($message_list))
	{
		$message = $message_list[$i];
		require('views/message.phtml');
		$i++;
	}
}
?>