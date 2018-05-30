<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;

class LibraryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('name', TextType::class, [
            'constraints' => [
              new NotBlank(),
              new Regex(['pattern' => '/^([a-z]*)$/i']),
              new Length(['min' => 3, 'max' => 20])
            ],
            'attr' => ['class' => 'input']
          ])
          ->add('shelf_number', IntegerType::class, [
            'constraints' => [
              new NotBlank(),
              new Range(['min' => 1, 'max' => 20])
            ],
            'attr' => ['class' => 'input']
          ])
          ->add('book_number', IntegerType::class, [
            'constraints' => [
              new NotBlank(),
              new Range(['min' => 1, 'max' => 80])
            ],
            'attr' => ['class' => 'input']
          ])
          ->add('created_at')
          ->add('updated_at');
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Library'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_library';
    }


}
