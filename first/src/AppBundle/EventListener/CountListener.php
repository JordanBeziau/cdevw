<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 29/05/2018
 * Time: 09:52
 */

namespace AppBundle\EventListener;


use AppBundle\Entity\Book;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class CountListener
{
  protected $doctrine;
  protected $twig;

  public function __construct(EntityManager $doctrine, \Twig_Environment $twig)
  {
    $this->setDoctrine($doctrine);
    $this->setTwig($twig);
  }

  public function setTwigGlobal($value)
  {
    return $this->twig->addGlobal('bookNumber', $value);
  }

  public function processCount(FilterControllerEvent $event)
  {
    if ($event->isMasterRequest())
      return $this->setTwigGlobal(count($this->doctrine->getRepository(Book::class)->findAll()));
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

  /**
   * @return \Twig_Environment
   */
  public function getTwig()
  {
    return $this->twig;
  }

  /**
   * @param \Twig_Environment $twig
   */
  public function setTwig($twig)
  {
    $this->twig = $twig;
  }
}