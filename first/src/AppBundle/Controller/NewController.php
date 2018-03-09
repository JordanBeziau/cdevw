<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 09/03/2018
 * Time: 09:29
 */

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class NewController extends Controller
{
  /**
   * @Route("/object", name="object")
   */
  public function createAction()
  {
    return $this->render("@App/object.html.twig", []);
  }
}