<?php
namespace AlbumPhotos\Model;
 
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="album")
*/
class Album
{
	/**
	 * @ORM\Id @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var integer
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=150)
	 *
	 * @var string
	 */
	private $name;
	
	/**
	 * @ORM\Column(type="string", length=255)
	 *
	 * @var string
	 */
	private $description;

	/**
	 * @ORM\Column(type="string", length=37)
	 *
	 * @var string
	 */
	private $coverpage;

	/**
     * @ORM\Column(name="userid")
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="id", onDelete="CASCADE")
     * @var int
     */
	private $userid;

	/**
	 * @return integer
	 */
	public function getId()
	{
	    return $this->id;
	}
	
	public function getName()
	{
	    return $this->name;
	}
	
	public function setName($name)
	{
	    return $this->name = $name;
	}
	
	public function getCoverPage()
	{
	    return $this->coverpage;
	}
	
	public function setCoverPage($coverPage)
	{
	    return $this->coverpage = $coverPage;
	}

	public function getDescription()
	{
	    return $this->description;
	}
	
	public function setDescription($description)
	{
	    return $this->description = $description;
	}

	public function getUserId()
	{
	    return $this->userid;
	}
	
	public function setUserId($userid)
	{
	    return $this->userid = $userid;
	}
}