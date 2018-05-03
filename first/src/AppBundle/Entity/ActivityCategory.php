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
 * Class ActivityCategory
 * @ORM\Entity
 * @ORM\Table(name="activity_category")
 */
class ActivityCategory
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Activity", inversedBy="activity_category")
   */
  protected $id_activity;

  /**
   * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category", inversedBy="category_activity")
   */
  protected $id_category;

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
  public function getIdActivity()
  {
    return $this->id_activity;
  }

  /**
   * @param mixed $id_activity
   */
  public function setIdActivity($id_activity)
  {
    $this->id_activity = $id_activity;
  }

  /**
   * @return mixed
   */
  public function getIdCategory()
  {
    return $this->id_category;
  }

  /**
   * @param mixed $id_category
   */
  public function setIdCategory($id_category)
  {
    $this->id_category = $id_category;
  }
}