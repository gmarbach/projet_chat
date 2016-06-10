<?php
class Message
{
	private $id;
	private $id_author;
	private $content;
	private $date;

	private $author;
	private $link;

	public function __construct($link)
	{
		$this->link=$link;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getIdAuthor()
	{
		return $this->id_author;
	}

	public function getAuthor()
	{
		if ($this->author === null)
		{
			$manager = new UserManager($link);
			$this->author = $manager->getById($this->id_author);
		}
		return $this->author;
	}

	public function getDate()
	{
		return $this->date;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setAuthor(User $author)
	{
		$this->id_author = $author->getId();
		$this->author = $author;
	}

	public function setContent($content)
	{
		if (strlen($content)>255)
		{
			throw new Exception("Votre message est trop long! (>255)");
		}

		else if(strlen($content)<1)
		{
			throw new Exception("Votre message est trop court! (<1)");
			
		}
		$this->content=$content;
	}

}
?>