<?php
namespace AlbumPhotos\Model;
 
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="user")
*/
class User
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
	 * @ORM\Column(type="string", length=20, unique=true)
	 *
	 * @var string
	 */
	private $login;
		
	/**
	 * @ORM\Column(type="string", length=150)
	 *
	 * @var string
	 */
	private $password;

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
	
	public function getLogin()
	{
	    return $this->login;
	}
	
	public function setLogin($login)
	{
	    return $this->login = $login;
	}
	
	public function getPassword()
	{
	    return $this->password;
	}
	
	public function setPassword($password)
	{
	    return $this->password = $password;
	}
}