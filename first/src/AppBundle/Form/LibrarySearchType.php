<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class LibrarySearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
        ->add('nameOptions', ChoiceType::class, [
          'multiple' => false,
          'expanded' => true,
          'choices' => ['same' => 'Same', 'like' => 'Like']
        ])
        ->add('name', TextType::class, [
          'label' => false,
          'required' => true,
          'attr' => [
            'placeholder' => 'Library',
            'class' => 'input',
          ],
          'constraints' => [
            new NotBlank(),
            new Length(['min' => 3]),
          ]
        ])
        ->add('bookNumber', IntegerType::class, [
          'label' => false,
          'required' => false,
          'attr' => [
            'placeholder' => 'Book num.',
            'class' => 'input'
          ]
        ])
        ->add('createdAt', DateTimeType::class);
    }
}
