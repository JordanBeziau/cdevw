<?php

namespace AppBundle\Controller;

use AppBundle\Form\EventType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('@App/home.html.twig', []);
    }
    
    /**
     * @Route("/event/new", name="newEvent")
     * @Method({"GET","POST"})
     */
  public function createEventAction(Request $request)
  {
    $form = $this->createForm(EventType::class, null, ['attr' => ['class' => 'form']]);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $this->get('event.service')->registerNewEvent($form->getData());
    }
    return $this->render('@App/newEvent.html.twig', [
      'form' => $form->createView()
    ]);
  }
}
