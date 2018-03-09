<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\User;
use AppBundle\Form\CategoryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    
    /**
     * @Route("/blog", name="blogpage")
     */
  public function blogAction() {
    $em = $this->getDoctrine()->getManager();
    dump($em->getRepository(User::class)->findAll());
    return $this->render('@App/blog.html.twig', []);
  }

  /**
   * @Route("/form", name="form", defaults={"id" = null})
   * @Route("/form/{id}", name="updateForm")
   * @Method({"GET", "POST"})
   */
  public function formAction(Request $request, Category $id = null) {
    $form = $this->createForm(CategoryType::class, $category = $id ? $id : new Category());
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $this->getDoctrine()->persist($category);
      $this->getDoctrine()->flush();
    }
    return $this->render('@App/form.html.twig', [
      "form" => $form->createView(),
    ]);
  }
}
