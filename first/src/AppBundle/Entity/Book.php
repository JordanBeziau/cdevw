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
 * @ORM\Table(name="book")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookRepository")
 */
class Book
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
   * @ORM\Column(name="author", type="string", length=255, nullable=true)
   */
  protected $author;

  /**
   * @ORM\Column(name="lib_id", type="integer", nullable=true)
   */
  protected $lib_id;

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
  public function getAuthor()
  {
    return $this->author;
  }

  /**
   * @param mixed $author
   */
  public function setAuthor($author)
  {
    $this->author = $author;
  }

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
}