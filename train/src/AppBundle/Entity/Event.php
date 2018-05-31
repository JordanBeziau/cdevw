<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 30/05/2018
 * Time: 09:58
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class Activity
 * @ORM\Entity
 * @ORM\Table(name="event")
 */
class Event
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\OneToMany(targetEntity="Event", mappedBy="parent")
   */
  protected $id;

  /**
   * @ORM\ManyToOne(targetEntity="Event", inversedBy="id")
   */
  protected $parent;

  /**
   * @ORM\Column(name="name", type="string", length=100, nullable=false)
   */
  protected $name;

  /**
   * @ORM\Column(name="date", type="datetime", nullable=false)
   */
  protected $date;

  /**
   * @ORM\Column(name="location", type="string", length=255, nullable=false)
   */
  protected $location;

  /**
   * @ORM\Column(name="description", type="text", nullable=false)
   */
  protected $description;

  /**
   * @ORM\Column(name="price", type="float", nullable=false)
   */
  protected $price;

  /**
   * @ORM\Column(name="duration", type="datetime", nullable=false)
   */
  protected $duration;

  /**
   * @ORM\Column(name="created_at", type="datetime")
   */
  protected $createdAt;

  /**
   * @ORM\Column(name="updated_at", type="datetime")
   */
  protected $updatedAt;

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
  public function getDate()
  {
    return $this->date;
  }

  /**
   * @param mixed $date
   */
  public function setDate($date)
  {
    $this->date = $date;
  }

  /**
   * @return mixed
   */
  public function getLocation()
  {
    return $this->location;
  }

  /**
   * @param mixed $location
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }

  /**
   * @return mixed
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * @param mixed $description
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }

  /**
   * @return mixed
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * @param mixed $price
   */
  public function setPrice($price)
  {
    $this->price = $price;
  }

  /**
   * @return mixed
   */
  public function getDuration()
  {
    return $this->duration;
  }

  /**
   * @param mixed $duration
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }

  /**
   * @return mixed
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  /**
   * @param mixed $createdAt
   */
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }

  /**
   * @return mixed
   */
  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }

  /**
   * @param mixed $updatedAt
   */
  public function setUpdatedAt($updatedAt)
  {
    $this->updatedAt = $updatedAt;
  }

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param mixed $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * @return mixed
   */
  public function getParent()
  {
    return $this->parent;
  }

  /**
   * @param mixed $parent
   */
  public function setParent($parent)
  {
    $this->parent = $parent;
  }

  function __toString()
  {
    return $this->name;
  }
}