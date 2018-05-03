<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 03/05/2018
 * Time: 10:00
 */

namespace AppBundle\Form;

use AppBundle\Entity\Book;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookListLibraryType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add('bookList', EntityType::class, [
      'label' => 'Livres',
      'mapped' => false,
      'multiple' => true,
      'expanded' => true,
      'class' => Book::class,
      'query_builder' => function (EntityRepository $er) use ($options) {
        return $er->createQueryBuilder('book')->where('book.lib_id = '. $options['library']->getId());
      }
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'library' => null,
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