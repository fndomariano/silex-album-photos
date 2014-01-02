<?php
namespace AlbumPhotos\Model;
 
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="photo")
*/
class Photo
{
	/**
	 * @ORM\Id @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var integer
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=50)
	 *
	 * @var string
	 */
	private $title;

	/**
	 * @ORM\Column(type="string", length=45)
	 *
	 * @var string
	 */
	private $photo;

	/**
	 * @ORM\Column(type="string", length=255)
	 *
	 * @var string
	 */
	private $legend;

	/**
     * @ORM\Column(name="albumid")
     * @ORM\ManyToOne(targetEntity="Album")
     * @ORM\JoinColumn(name="id", onDelete="CASCADE")
     * @var int
     */
	private $albumid;

	/**
	 * @return integer
	 */
	public function getId()
	{
	    return $this->id;
	}
	
	public function getTitle()
	{
	    return $this->title;
	}
	
	public function setTitle($title)
	{
	    return $this->title = $title;
	}

	public function getPhoto()
	{
		return $this->photo;
	}

	public function setPhoto($photo)
	{
		return $this->photo = $photo;
	}

	public function getLegend()
	{
	    return $this->legend;
	}
	
	public function setLegend($legend)
	{
	    return $this->legend = $legend;
	}

	public function getAlbumId()
	{
	    return $this->albumid;
	}
	
	public function setAlbumId($albumid)
	{
	    return $this->albumid = $albumid;
	}
}