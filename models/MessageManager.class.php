<?php
class MessageManager
{
	private $link;
	public function __construct($link)
	{
		$this->link=$link;
	}

	public function getById($id)
	{
		$id=intval($id);
		$query="SELECT * FROM messages WHERE id=".$id;
		$res=mysqli_query($this->link,$query);
		$message=mysqli_fetch_object($res,"Message",[$this->link]);
		return $message;
	}

	public function getAll()
	{
		$query = "SELECT * FROM messages";
		$res = mysqli_query($this->link, $query);
		$list = [];
		while ($messages = mysqli_fetch_object($res, "Message", [$this->link]))
			$list[] = $messages;
		return $list;
	}

	public function create($data, User $user)
	{
		$message=new Message($this->link);
		if (!isset($data['content']))
		{
			throw new Exception("Paramètre manquant:contenu");
		}
		$message->setContent($data['content']);
		$message->setAuthor($author);

		$id_author=mysqli_real_escape_string($this->link,$message->getAuthor()->getId());
		$content=mysqli_real_escape_string($this->link,$message->getContent());

		$query="INSERT INTO messages(id_author,content) VALUES ('".$id_author."','".$content."')";
		$res=mysqli_query($this->link,$query);

		if($res)
		{
			$id=mysqli_insert_id($this->link);
			if($id)
			{
				$message=$this->getById($id);
				return $message;
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
}
?>