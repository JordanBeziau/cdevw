<?php

namespace AppBundle\Form;

use AppBundle\Entity\Event;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class EventType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('name', TextType::class, ['constraints' => [new Length(['min' => 2, 'max' => 100])]])
          ->add('date', DateTimeType::class)
          ->add('location', TextType::class, ['constraints' => [new Length(['min' => 1])]])
          ->add('description', TextareaType::class, ['constraints' => [new Length(['min' => 1])]])
          ->add('price', NumberType::class)
          ->add('duration', DateTimeType::class)
          ->add('parent', EntityType::class, [
            'class' => Event::class,
            'multiple' => false,
            'expanded' => false,
          ]);
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Event'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_event';
    }


}
