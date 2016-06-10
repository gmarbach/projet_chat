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
		$message=mysqli_fetch_object($res,"Message",[$this->linl]);
		return $message;
	}

	public function getAll()
	{
		$query = "SELECT * FROM messages";
		$res = mysqli_query($this->link, $query);
		$list = [];
		while ($messages = mysqli_fetch_object($res, "Messages", [$this->link]))
			$list[] = $messages;
		return $list;
	}

	public function create($data)
	{
		$message=new Message($this->link)
		{
			if(!isset($data['auteur']))
			{
				throw new Exception("Paramètre manquant: auteur");
			}

			if (!isset($data['content']))
			{
				throw new Exception("Paramètre manquant:contenu");
				
			}
			$message->setContent($data['content']);
			$message->setAuthor($data['author']);

			$author=mysqli_real_escape_string($this->link,$message->getAuthor());
			$content=mysqli_real_escape_string($this->link,$message->getContent());

			$query="INSERT INTO messages(author,content) VALUES ('".$author."','".$content."')";
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
				throw new Exception("Erreur Intern");				
			}
		}
	}
}
?>