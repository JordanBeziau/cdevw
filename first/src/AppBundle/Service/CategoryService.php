<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 02/05/2018
 * Time: 09:48
 */

namespace AppBundle\Service;


use AppBundle\Entity\Activity;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\ActivityCategory;

class CategoryService
{
  private $doctrine;
  private $relationExist;

  public function __construct(EntityManager $doctrine)
  {
    $this->setDoctrine($doctrine);
  }

  public function MyCategory()
  {
    return 'Hello World !';
  }

  public function handleRelation(Activity $activity, Array $formData)
  {
    $activityCategory = $this->joinRequest($activity->getId());
    foreach($activityCategory as $ac) {
      $find = array_search($ac->getIdCategory()->getId(), $formData['activityCategory']);
      if ($find !== false) {
        unset($formData['activityCategory'][$find]);
      } else {
        $this->doctrine->remove($ac);
        $this->doctrine->flush();
      }
    }
    return $formData;
  }

  public function joinRequest($id)
  {
    if ($id)
      return $this->relationExist = $this->doctrine->getRepository(ActivityCategory::class)->findBy(['id_activity' => $id]);

    return [];
  }

  /**
   * @return mixed
   */
  public function getDoctrine()
  {
    return $this->doctrine;
  }

  /**
   * @param mixed $doctrine
   */
  private function setDoctrine($doctrine)
  {
    $this->doctrine = $doctrine;
  }

  /**
   * @return mixed
   */
  public function getRelationExist()
  {
    return $this->relationExist;
  }

  /**
   * @param mixed $relationExist
   */
  public function setRelationExist($relationExist)
  {
    $this->relationExist = $relationExist;
  }


}