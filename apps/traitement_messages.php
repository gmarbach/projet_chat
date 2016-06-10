<?php
$message_manager=new MessageManager($link);
if (isset($_POST['author'], $_POST['content']))
{
	try
	{
		$message=$message_manager->create($_POST);
		header('Location:index.php?page=affichage');
		exit;
	}
	catch (Exception $e)
	{
		$error=$e->getMessage();
	}
}
?>