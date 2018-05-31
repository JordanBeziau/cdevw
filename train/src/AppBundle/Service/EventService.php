<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 30/05/2018
 * Time: 15:57
 */

namespace AppBundle\Service;


use AppBundle\Entity\Event;
use Doctrine\ORM\EntityManager;

class EventService
{
  private $doctrine;
  
  function __construct(EntityManager $doctrine)
  {
    $this->setDoctrine($doctrine);
  }

  public function registerNewEvent(Event $data)
  {
    $data->setCreatedAt(new \DateTime('now'));
    $data->setUpdatedAt(new \DateTime('now'));
    $this->getDoctrine()->persist($data);
    $this->getDoctrine()->flush();
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
  public function setDoctrine($doctrine)
  {
    $this->doctrine = $doctrine;
  }
}