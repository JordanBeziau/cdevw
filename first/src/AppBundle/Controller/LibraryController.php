<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 03/04/2018
 * Time: 09:57
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Library;
use AppBundle\Form\LibrarySearchType;
use AppBundle\Form\LibraryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class LibraryController extends Controller
{
  /**
   * @Route("/library", name="libraryPage")
   * @Method({"GET", "POST"})
   */
  public function libraryAction(Request $request) {
    $form = $this->createForm(LibrarySearchType::class, null, ['attr' => ['class' => 'form']]);
    $form->handleRequest($request);
    $em = $this->getDoctrine()->getManager();
    if ($form->isSubmitted() && $form->isValid()) {
      $datas = $em->getRepository(Library::class)->getSearchLibrary($form->getData());
    } else {
      $datas = $em->getRepository(Library::class)->findAll();
    }
    return $this->render('@App/library.html.twig', [
      'datas' => $datas,
      'form' => $form->createView(),
    ]);
  }

  /**
   * @Route("/library/new", name="libraryCreate", defaults={"id"=null})
   * @Route("/library/edit/{id}", name="libraryUpdate")
   * @Method({"GET", "POST"})
   */
  public function libraryCreateAction(Request $request, Library $id = null) {
    $form = $this->createForm(LibraryType::class, $id ? $id : new Library(), ['attr' => ['class' => 'form']])
      ->remove('created_at')
      ->remove('updated_at');
    if (!$id) $form->remove('book_number');
    $form->handleRequest($request);
    $em = $this->getDoctrine()->getManager();
    if ($form->isSubmitted() && $form->isValid()) {
      if (!$id) {
        $form->getData()->setBookNumber(0);
        $form->getData()->setCreatedAt(new \DateTime('now'));
      }
      $form->getData()->setUpdatedAt(new \DateTime('now'));
      $em->persist($form->getData());
      $em->flush();
    }
    $datas = $em->getRepository(Library::class)->findAll();
    return $this->render('@App/libraryCreate.html.twig', [
      'datas' => $datas,
      'form' => $form->createView(),
    ]);
  }
}