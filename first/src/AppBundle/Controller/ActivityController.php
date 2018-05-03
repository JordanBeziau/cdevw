<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 06/04/2018
 * Time: 09:29
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Activity;
use AppBundle\Entity\ActivityCategory;
use AppBundle\Entity\Category;
use AppBundle\Form\ActivityType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class ActivityController extends Controller
{
  /**
   * @Route("/activity", name="activity", defaults={})
   * @Route("/activity/{id}", name="activityUpdate")
   * @Method({"GET", "POST"})
   */
  public function activityAction (Request $request, Activity $id = null)
  {
    $em = $this->getDoctrine()->getManager();
    $categoryService = $this->get('categorie.service');
    $form = $this->createForm(ActivityType::class, $activity = $id ? $id : new Activity(), [
      'attr' => ['class' => 'form'],
      'activityCategory' => $categoryService->joinRequest($id)
    ]);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $em->persist($activity);
      $em->flush();

      $formPost = $request->request->get('appbundle_activity');
      if (array_key_exists('activityCategory', $formPost) && !empty($formPost['activityCategory'])) {
        $formPost = $categoryService->handleRelation($activity, $formPost);
        foreach ($formPost['activityCategory'] as $item) {
          $newActivityCategory = new ActivityCategory();
          $newActivityCategory->setIdActivity($form->getData());
          $newActivityCategory->setIdCategory($em->getRepository(Category::class)->findOneBy(['id' => $item]));
          $em->persist($newActivityCategory);
          $em->flush();
        }
      }
    }
    return $this->render('@App/activity.html.twig', [
      'form' => $form->createView()
    ]);
  }
}