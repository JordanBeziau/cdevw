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
 * Class CategoryService
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
   * @ORM\OneToMany(targetEntity="AppBundle\Entity\ActivityCategory", mappedBy="id_category")
   */
  protected $category_activity;

  public function __toString()
  {
    return $this->name;
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
  public function getCategoryActivity()
  {
    return $this->category_activity;
  }

  /**
   * @param mixed $category_activity
   */
  public function setCategoryActivity($category_activity)
  {
    $this->category_activity = $category_activity;
  }
}