<?php

namespace AppBundle\Form;

use AppBundle\Entity\Library;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class BookTestType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
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
          'expanded' => false,
          'query_builder' => function (EntityRepository $er) {
            $query = $er->createQueryBuilder('lib')->where('lib.content = \'book\'');
            return $query;
          }
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
