<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 03/04/2018
 * Time: 09:57
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Library;
use AppBundle\Form\BookListLibraryType;
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
    $libraryService = $this->get('library.service');
    $form = $this->createForm(LibrarySearchType::class, null, ['attr' => ['class' => 'form']]);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid())
      $datas = $libraryService->LibraryRegister($form->getData());
    else $datas = $libraryService->LibraryList();

    return $this->render('@App/library.html.twig', [
      'datas' => $datas,
      'form' => $form->createView(),
    ]);
  }

  /**
   * @Route("/library/{id}", name="oneLibrary", defaults={})
   * @Method({"GET", "POST"})
   */
  public function libraryListAction(Request $request, Library $id)
  {
    $form = $this->createForm(BookListLibraryType::class, null, ['library' => $id]);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      dump($form->getData());
    }

    return $this->render('@App/bookListLibrary.html.twig', [
      'form' => $form->createView(),
      'title' => $id->getName()
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