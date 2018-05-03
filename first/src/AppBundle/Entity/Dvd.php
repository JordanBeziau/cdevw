<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 08/03/2018
 * Time: 14:15
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Activity
 * @ORM\Entity
 * @ORM\Table(name="dvd")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DvdRepository")
 */
class Dvd
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(name="name", type="string", length=255, nullable=true)
   */
  protected $name;

  /**
   * @ORM\Column(name="genre", type="string", length=255, nullable=true)
   */
  protected $genre;
  /**
   * ORM\Column(name="lib_id", type="integer", nullable=true)
  * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Library")
  */
  protected $lib_id;

  /**
   * @return mixed
   */
  public function getLibId()
  {
    return $this->lib_id;
  }

  /**
   * @param mixed $lib_id
   */
  public function setLibId($lib_id)
  {
    $this->lib_id = $lib_id;
  }



  /**
   * @return mixed
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param mixed $name
   */
  public function setName($name)
  {
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function getGenre()
  {
    return $this->genre;
  }

  /**
   * @param mixed $genre
   */
  public function setGenre($genre)
  {
    $this->genre = $genre;
  }

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

}