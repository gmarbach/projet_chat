<?php
class User
{
	private $id;
	private $pseudo;
	private $statut;

	private $link;

	public function __construct($link)
	{
		$this->link=$link;
	}
	public function getId()
	{
		return $this->id;
	}

	public function getPseudo()
	{
		return $this->pseudo;
	}

	public function getStatut()
	{
		return $this->statut;
	}

	public function setPseudo($pseudo)
	{
		if (strlen($pseudo)<2)
		{
			throw new Exception("Pseudo trop court (<2)");
		}

		if (strlen($pseudo)>15)
		{
			throw new Exception("Pseudo trop long (>15)");			
		}
		$this->pseudo=$pseudo;
	}

	public function setStatut($statut)
	{
		if ($statut !=1 && $statut!=0)
		{
			throw new Exception("Paramètre incorrect:statut");
		}
		$this->statut=$statut;
	}
}
?>