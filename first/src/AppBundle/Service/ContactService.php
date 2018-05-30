<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 04/05/2018
 * Time: 14:37
 */

namespace AppBundle\Service;

use AppBundle\Entity\Contact;
use Doctrine\ORM\EntityManager;

class ContactService
{
  private $doctrine;

  public function __construct(EntityManager $doctrine)
  {
    $this->setDoctrine($doctrine);
  }

  public function handleMail(array $data)
  {
    $contact = new Contact();
    $contact->setName($this->filterName($data['firstName'], $data['lastName']));
    $contact->setEmail($data['email']);
    $contact->setMessage($data['message']);
    $contact->setCreatedAt($this->getNowDate());
    $contact->setUpdatedAt($this->getNowDate());

    $this->doctrine->persist($contact);
    $this->doctrine->flush();
  }

  public function getNowDate()
  {
    return new \DateTime('now');
  }

  public function filterName($firstName, $lastName)
  {
    return $firstName . ' ' . $lastName;
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
}