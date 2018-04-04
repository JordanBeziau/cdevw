<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 09/03/2018
 * Time: 09:29
 */

namespace AppBundle\Controller;
use AppBundle\Entity\Object;
use AppBundle\Entity\Props;
use AppBundle\Form\PropsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Bundle\DoctrineBundle\Registry;

class NewController extends Controller
{
  /**
   * @Route("/object", name="object")
   * @Method({"GET", "POST"})
   */
  public function createAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $form = $this->createForm(PropsType::class, $properties = new Props());
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()) {
      $em->persist($properties);
      $em->flush();
    }
    $objects = $em ->getRepository(Object::class)->findAll();
    $properties = [];
    foreach ($objects as $object) {
      $props = $em
        ->getRepository(Props::class)
        ->findBy(["object" => $object->getId()]);
      if ($props)
        $properties[$object->getProperties()] = $props;
    }
    dump($properties);
    return $this->render("@App/object.html.twig", [
      "form" => $form->createView(),
      "objects" => $objects,
      "properties" => $properties
    ]);
  }
}