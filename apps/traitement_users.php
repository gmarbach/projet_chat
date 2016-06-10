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
			
		}

		else 
		{
			$user=$user_manager->create($_POST);
			
		}
		$_SESSION['id']=$user->getId();
		header('location:index.php?page=affichage');
		exit;
	}
	catch (Exception $e)
	{
		$error = $e->getMessage();
	}
}

if(isset($_SESSION['id'], $_GET['page']) && $_GET['page']=='logout')
{
	$user = $user_manager->getById($_SESSION['id']);
	$user = $user->setStatut(0);
	$user_manager->update($user);
	session_destroy();
	header('location:index.php?page=affichage');
	exit;
}
?>