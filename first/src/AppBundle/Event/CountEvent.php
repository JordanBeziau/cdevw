<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 29/05/2018
 * Time: 09:37
 */

namespace AppBundle\Event;


use AppBundle\Entity\Book;

class CountEvent
{
  protected $doctrine;

  public function __construct(EntityManager $doctrine)
  {
    $this->doctrine = $doctrine;
  }

  public function countBook()
  {
    return count($this->getDoctrine()->getRepository(Book::class)->findAll());
  }

  /**
   * @return EntityManager
   */
  public function getDoctrine()
  {
    return $this->doctrine;
  }

  /**
   * @param EntityManager $doctrine
   */
  public function setDoctrine($doctrine)
  {
    $this->doctrine = $doctrine;
  }
}