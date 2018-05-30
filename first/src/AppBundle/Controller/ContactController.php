<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 04/05/2018
 * Time: 09:40
 */

namespace AppBundle\Controller;


use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
  /**
   * @Route("/contact", name="contact")
   * @Method({"GET","POST"})
   */
  public function contactAction(Request $request)
  {
    $form = $this->createForm(ContactType::class);
    $form->handleRequest($request);
    $data = $request->request->get('appbundle_contact');

    if ($form->isValid() && $form->isSubmitted())
      $this->get('contact.service')->handleMail($data);

    return $this->render('@App/contactPage.html.twig', ['form' => $form->createView()]);
  }
}