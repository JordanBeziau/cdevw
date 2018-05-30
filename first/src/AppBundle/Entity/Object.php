<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 09/03/2018
 * Time: 09:39
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Object
 * @ORM\Entity
 * @ORM\Table(name="object")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ObjectRepository")
 */
class Object
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(name="properties", type="string", length=255, nullable=false, unique=true)
   */
  protected $properties;

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
  public function getProperties()
  {
    return $this->properties;
  }

  /**
   * @param mixed $properties
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }

  public function __toString()
  {
    return $this->getProperties();
  }
}