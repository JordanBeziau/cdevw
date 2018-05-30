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
use AppBundle\Event\BigBrother;
use AppBundle\Event\CountEvent;
use AppBundle\Event\PostBookEvent;
use AppBundle\Form\BookTestType;
use AppBundle\Form\BookType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormError;
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
    $form = $this->createForm(BookTestType::class, null, [
      'attr' => ['class' => 'form']
    ]);
    $form->handleRequest($request);
    $postForm = $request->request->get('appbundle_book');
    if ($form->isSubmitted() && $form->isValid()) {
      if ($postForm['height'] > 30) {
        $form->get('height')->addError(new FormError('Hauteur trop élevée.'));
      } else {
        $event = new PostBookEvent('Nouveau livre', $form->getData());
        $this->get('event_dispatcher')->dispatch(BigBrother::onMessagePost, $event);
        $em->persist($form->getData());
        $em->flush();
      }
    }
    return $this->render('@App/book.html.twig', [
      'form' => $form->createView()
    ]);
  }
}