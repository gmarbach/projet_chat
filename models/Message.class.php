<?php
class Message
{
	private $id;
	private $author;
	private $content;
	private $date;

	private $link;

	public function __construct($link)
	{
		$this->link=$link;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getAuthor()
	{
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

	public function setAuthor($author)
	{
		if (strlen($author)<2)
		{
			throw new Exception("Nom trop court (<2)");
		}

		else if (strlen($author)>15)
		{
			throw new Exception("Nom trop long (>15)");
		}
		$this->author=$author;
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