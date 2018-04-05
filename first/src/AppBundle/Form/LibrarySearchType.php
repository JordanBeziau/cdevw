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
          'choices' => ['Same' => 'same', 'Like' => 'like'],
          'preferred_choices' => ['Like' => 'like']
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
          ]
        ])
        ->add('bookOptions', ChoiceType::class, [
          'multiple' => false,
          'expanded' => true,
          'choices' => ['And' => 'and', 'Or' => 'or'],
        ])
        ->add('bookNumber', IntegerType::class, [
          'label' => false,
          'required' => false,
          'attr' => [
            'placeholder' => 'BookController num.',
            'class' => 'input'
          ]
        ])
        ->add('dateOptions', ChoiceType::class, [
          'multiple' => false,
          'expanded' => true,
          'choices' => ['And' => 'and', 'Or' => 'or']
        ])
        ->add('createdAt', DateTimeType::class);
    }
}
