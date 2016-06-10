<?php
$message_manager=new MessageManager($link);
if ($_POST['content']))
{
	if (isset($_SESSION['id'])
	{
		try
		{
			$user_manager = new UserManager($link);
			$author = $user_manager->getById($_SESSION['id']);
			$message=$message_manager->create($_POST, $author);
			header('Location:index.php?page=affichage');
			exit;
		}
		catch (Exception $e)
		{
			$error=$e->getMessage();
		}
	}
	else
	{
		$error = "Vous devez être connecté";
	}
}
?>