<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('firstName', TextType::class, [
            'constraints' => [
              new NotBlank(),
              new Length(['min' => 3, 'max' => 50])
            ],
            'attr' => [
              'class' => 'input',
              'autocomplete' => 'given-name'
            ]
          ])
          ->add('lastName', TextType::class, [
            'constraints' => [
              new NotBlank(),
              new Length(['min' => 3, 'max' => 50])
            ],
            'attr' => [
              'class' => 'input',
              'autocomplete' => 'family-name'
            ]
          ])
          ->add('email', EmailType::class, [
            'constraints' => [
              new NotBlank(),
              new Email()
            ],
            'attr' => [
              'class' => 'input',
              'autocomplete' => 'email'
            ]
          ])
          ->add('message', TextareaType::class, [
            'constraints' => [
              new NotBlank(),
            ],
            'attr' => ['class' => 'textarea', 'maxlength' => 80]
          ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }


}
