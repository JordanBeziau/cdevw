<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 08/03/2018
 * Time: 14:42
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Library
 * @ORM\Entity
 * @ORM\Table(name="library")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LibrarySearchRepository")
 */
class Library
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
   * @ORM\Column(name="shelf_number", type="integer", nullable=true)
   */
  protected $shelf_number;

  /**
   * @ORM\Column(name="book_number", type="integer", nullable=true)
   */
  protected $book_number;

  /**
   * @ORM\Column(name="content", type="string", length=255, nullable=false)
   */
  protected $content;

  /**
   * @ORM\Column(name="created_at", type="datetime", nullable=true)
   */
  protected $created_at;

  /**
   * @ORM\Column(name="updated_at", type="datetime", nullable=true)
   */
  protected $updated_at;

  public function __toString()
  {
    return $this->name;
  }

  /**
   * @return mixed
   */
  public function getContent()
  {
    return $this->content;
  }

  /**
   * @param mixed $content
   */
  public function setContent($content)
  {
    $this->content = $content;
  }

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
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
  public function getShelfNumber()
  {
    return $this->shelf_number;
  }

  /**
   * @param mixed $shelf_number
   */
  public function setShelfNumber($shelf_number)
  {
    $this->shelf_number = $shelf_number;
  }

  /**
   * @return mixed
   */
  public function getBookNumber()
  {
    return $this->book_number;
  }

  /**
   * @param mixed $book_number
   */
  public function setBookNumber($book_number)
  {
    $this->book_number = $book_number;
  }

  /**
   * @return mixed
   */
  public function getCreatedAt()
  {
    return $this->created_at;
  }

  /**
   * @param mixed $created_at
   */
  public function setCreatedAt($created_at)
  {
    $this->created_at = $created_at;
  }

  /**
   * @return mixed
   */
  public function getUpdatedAt()
  {
    return $this->updated_at;
  }

  /**
   * @param mixed $updated_at
   */
  public function setUpdatedAt($updated_at)
  {
    $this->updated_at = $updated_at;
  }
}