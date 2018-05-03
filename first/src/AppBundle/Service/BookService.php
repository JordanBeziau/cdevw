<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 02/05/2018
 * Time: 15:51
 */

namespace AppBundle\Service;


use AppBundle\Entity\Book;
use AppBundle\Entity\Library;
use Doctrine\ORM\EntityManager;

class BookService
{
  private $doctrine;

  public function __construct(EntityManager $doctrine)
  {
    $this->setDoctrine($doctrine);
  }

  public function getBookList(Library $library)
  {
    return $this->getDoctrine()->getRepository(Book::class)->findBy(['lib_id' => $library->getId()]);
  }

  public function bookDelete()
  {
    return 'test';
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