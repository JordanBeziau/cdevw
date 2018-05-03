<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 03/05/2018
 * Time: 09:25
 */

namespace AppBundle\Service;


use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Library;

class LibraryService
{
  private $doctrine;

  public function __construct(EntityManager $doctrine)
  {
    $this->setDoctrine($doctrine);
  }

  public function LibraryRegister($data)
  {
    return $this->getDoctrine()->getRepository(Library::class)->getSearchLibrary($data);
  }

  public function LibraryList()
  {
    return $this->getDoctrine()->getRepository(Library::class)->findAll();
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