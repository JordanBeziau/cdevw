<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 08/03/2018
 * Time: 14:24
 */

namespace AppBundle\Repository;
use Doctrine\ORM\EntityRepository;

class LibrarySearchRepository extends EntityRepository
{
  public function getSearchLibrary ($datas) {
    dump($datas);
    $query = $this->createQueryBuilder('lib');
    if(array_key_exists('name', $datas) && !empty($datas['name'])) {
      $query->where('lib.name = :name')->setParameter(':name', $datas['name']);
    }
    if(array_key_exists('bookNumber', $datas) && !empty($datas['bookNumber'])) {
      $query->andWhere('lib.book_number >= :book_number')->setParameter(':book_number', $datas['bookNumber']);
    }
    if(array_key_exists('createdAt', $datas) && !empty($datas['createdAt'])) {
      $query->andWhere('lib.created_at >= :created_at')->setParameter(':created_at', $datas['createdAt']);
    }
    return $query->getQuery()->getResult();
  }
}