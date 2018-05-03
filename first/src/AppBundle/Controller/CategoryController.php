<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 06/04/2018
 * Time: 09:29
 */

namespace AppBundle\Controller;


use AppBundle\Form\ActivityType;
use AppBundle\Form\CategoryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class CategoryController extends Controller
{
  /**
   * @Route("/category", name="category")
   * @Method({"GET", "POST"})
   */
  public function activityAction (Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $form = $this->createForm(CategoryType::class, null, [
      'attr' => ['class' => 'form']
    ]);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      dump($form->getData());
      $em->persist($form->getData());
      $em->flush();
    }
    return $this->render('@App/category.html.twig', [
      'form' => $form->createView()
    ]);
  }
}