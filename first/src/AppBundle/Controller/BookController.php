<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 04/04/2018
 * Time: 16:27
 */

namespace AppBundle\Controller;


use AppBundle\AppBundle;
use AppBundle\Entity\Library;
use AppBundle\Form\BookType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class BookController extends Controller
{
  /**
   * @Route("/book", name="book")
   * @Method({"GET", "POST"})
   */
  public function bookAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $form = $this->createForm(BookType::class, null, [
      'library' => $em->getRepository(Library::class)->findAll(),
      'attr' => ['class' => 'form']
    ]);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $em->persist($form->getData());
      $em->flush();
    }
    return $this->render('@App/book.html.twig', [
      'form' => $form->createView()
    ]);
  }
}