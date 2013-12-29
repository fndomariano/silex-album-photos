<?php
namespace AlbumPhotos\Model;
 
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="photos")
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
	 * @ORM\Column(type="date")
	 *
	 * @var string
	 */
	private $datephoto;

	/**
	 * @ORM\Column(type="filename", length=45)
	 *
	 * @var string
	 */
	private $filename;
	
	
	/**
	 * @ORM\Column(type="string", length=50)
	 *
	 * @var string
	 */
	private $title;

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
	
	public function getDatePhoto()
	{
	    return $this->datephoto;
	}
	
	public function setDatePhoto($datePhoto)
	{
	    return $this->datephoto = $datePhoto;
	}
	
	public function getTitle()
	{
	    return $this->title;
	}
	
	public function setTitle($title)
	{
	    return $this->title = $title;
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
	
	public function setUserId($albumid)
	{
	    return $this->albumid = $albumid;
	}
}