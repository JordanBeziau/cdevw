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
 * Class Category
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(name="nom", type="string", length=255, nullable=true)
   */
  protected $name;

  /**
   * @ORM\Column(name="type", type="string", length=255, nullable=true)
   */
  protected $type;

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
  public function getType()
  {
    return $this->type;
  }

  /**
   * @param mixed $type
   */
  public function setType($type)
  {
    $this->type = $type;
  }
}