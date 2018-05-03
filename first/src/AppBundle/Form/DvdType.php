<?php

namespace AppBundle\Form;

use AppBundle\Entity\Library;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DvdType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('name')
          ->add('genre')
          ->add('lib_id', EntityType::class, [
            'class' => Library::class,
            'multiple' => false,
            'expanded' => false,
            'query_builder' => function (EntityRepository $er) {
              $query = $er->createQueryBuilder('lib')->where('lib.content = \'dvd\'');
              return $query;
            }
          ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
          'data_class' => 'AppBundle\Entity\Dvd',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_dvd';
    }


}
