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
 * @ORM\Table(name="activity")
 */
class Activity
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
   * @ORM\OneToMany(targetEntity="AppBundle\Entity\ActivityCategory", mappedBy="id_activity")
   */
  protected $activity_category;

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
  public function getActivityCategory()
  {
    return $this->activity_category;
  }

  /**
   * @param mixed $activity_category
   */
  public function setActivityCategory($activity_category)
  {
    $this->activity_category = $activity_category;
  }
}