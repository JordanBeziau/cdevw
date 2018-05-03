<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 04/04/2018
 * Time: 16:27
 */

namespace AppBundle\Controller;


use AppBundle\AppBundle;
use AppBundle\Entity\Dvd;
use AppBundle\Form\DvdType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;

class DvdController extends Controller
{
  /**
   * @Route("/dvd", name="dvd")
   * @Method({"GET", "POST"})
   */
  public function dvdAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $form = $this->createForm(DvdType::class, null, [
      'attr' => ['class' => 'form']
    ]);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $em->persist($form->getData());
      $em->flush();
    }
    return $this->render('@App/dvd.html.twig', [
      'form' => $form->createView()
    ]);
  }
}