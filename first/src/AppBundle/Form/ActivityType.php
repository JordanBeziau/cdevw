<?php

namespace AppBundle\Form;

use AppBundle\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ActivityType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      dump($options['activityCategory']);
        $builder
          ->add('name', TextType::class, [
            'constraints' => [new NotBlank()]
          ])
          ->add('activityCategory', EntityType::class, [
            'label' => 'Category',
            'mapped' => false,
            'multiple' => true,
            'expanded' => true,
            'class' => Category::class,
            'choice_attr' => function ($activityCategory) use ($options) {
              $attr = [];
              foreach ($options['activityCategory'] as $option) {
                if ($option->getIdCategory()->getId() === $activityCategory->getId()) {
                  $attr['checked'] = 'checked';
                }
              }
              return $attr;
            }
          ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Activity',
            'activityCategory' => null,
            'allow_extra_fields' => true
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_activity';
    }


}
