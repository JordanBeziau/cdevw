<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $libs = [];
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
        ->add('lib_id', ChoiceType::class, [
          'choices' => $libs
        ]);
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
