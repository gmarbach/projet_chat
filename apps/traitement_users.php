<?php
$user_manager= new UserManager($link);

if(isset($_POST['pseudo']) && isset($_GET['page']) && $_GET['page']=='login')
{
	try
	{
		$user=$user_manager->getByPseudo($_POST['pseudo']);
		if($user!=NULL)
		{
			$user->setStatut(1);
			$user=$user_manager->update($user);
			header('location:index.php?page=affichage');
			exit;
		}
		else 
		{
			$user=$user_manager->create($_POST);
			header('location:index.php?page=affichage');
			exit;
		}

	}
	catch (Exception $e)
	{
		$error = $e->getMessage();
	}
}

if(isset($_GET['page']) && $_GET['page']=='logout')
{
	session_destroy();
	header('location:index.php?page=affichage');
	exit;
}
?>