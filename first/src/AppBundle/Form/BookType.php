<?php

namespace AppBundle\Form;

use AppBundle\Entity\Library;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class BookType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $libs = [];
      /** @var $libraries Library */
      foreach ($options['library'] as $libraries) {
        $libs[$libraries->getId()] = $libraries->getName();
      }
      $builder
        ->add('name', TextType::class, [
          'attr' => ['class' => 'input']
        ])
        ->add('author', TextType::class, [
          'attr' => ['class' => 'input']
        ])
        ->add('height', IntegerType::class, [
          'constraints' => [
            new NotBlank(),
            new Range(['min' => 15, 'max' => 30])
          ],
          'mapped' => false
        ])
        ->add('lib_id', EntityType::class, [
          'class' => Library::class,
          'multiple' => false,
          'expanded' => false
        ]);
        /*->add('lib_id', ChoiceType::class, [
          'choices' => $libs,
          'choice_value' => function ($value) {
            return $value;
          }
        ]);*/
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Book',
            'library' => null,
            'allow_extra_fields' => true
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_book';
    }


}
