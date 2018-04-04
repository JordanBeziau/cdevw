<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 09/03/2018
 * Time: 09:53
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Props
 * @ORM\Entity
 * @ORM\Table(name="sec_props")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PropsRepository")
 */
class Props
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(name="properties", type="string", length=255, nullable=false)
   */
  protected $properties;

  /**
   * @ORM\ManyToOne(targetEntity="Object")
   */
  protected $object;

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

  /**
   * @return mixed
   */
  public function getObject()
  {
    return $this->object;
  }

  /**
   * @param mixed $object
   */
  public function setObject($object)
  {
    $this->object = $object;
  }
}