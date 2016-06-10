<?php
class UserManager
{
	private $link;
	public function __construct($link)
	{
		$this->link=$link;
	}

	public function getById($id)
	{
		$id=intval($id);
		$query="SELECT * FROM users WHERE id=".$id;
		$res=mysqli_query($this->link,$query);
		$user=mysqli_fetch_object($res, "User",[$this->link]);
		return $user;
	}

	public function getByStatut($statut)
	{
		$query="SELECT * FROM users WHERE statut=".$statut." ORDER BY pseudo";
		$res=mysqli_query($this->link,$query);
		$list=[];
		while($user=mysqli_fetch_object($res, "User",[$this->link]))
			$list[]=$user;
		return $list;
	}

	public function getByPseudo($pseudo)
	{
		$query="SELECT * FROM users WHERE pseudo='".$pseudo."'";
		$res=mysqli_query($this->link,$query);
		$user=mysqli_fetch_object($res,"User",[$this->link]);
		return $user;
	}

	public function getAll()
	{
		$query="SELECT * FROM users";
		$res=mysqli_query($this->link,$query);
		$list=[];
		while($user=mysqli_fetch_object($res,"User",[$this->link]))
			$list[]=$user;
		return $list;
	}

	public function create($data)
	{
		$user=new User($this->link);
		if(!isset($data['pseudo']))
		{
			throw new Exception("Paramètre manquant: pseudo");
		}

		$user->setPseudo($data['pseudo']);
		$user->setStatut(1);

		$pseudo=mysqli_real_escape_string($this->link, $user->getPseudo());
		$statut=intval($this->link,$user->getStatut());

		$query="INSERT INTO users(pseudo,statut) VALUES ('".$pseudo."','".$statut."')";
		$res=mysqli_query($this->link,$query);

		if($res)
		{
			$id=mysqli_insert_id($this->link);
			if($id)
			{
				$user=$this->getById($id);
				return $user;
			}
			else
			{
				throw new Exception("Erreur Interne");
			}
		}
		else
		{
			throw new Exception("Erreur Interne");
			
		}

	}

	public function update(User $user)
	{
		$id=$user->getId();
		$pseudo=mysqli_real_escape_string($this->link,$user->getPseudo());
		$statut=$user->getStatut();

		$query="UPDATE users SET pseudo='".$pseudo."',statut='".$statut."' WHERE id=".$id;
		$res=mysqli_query($this->link,$query);
		if($res)
		{
			return $this->getById($id);
		}
		else
		{
			throw new Exception("Erreur Interne");
			
		}
	}
}
?>