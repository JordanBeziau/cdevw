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
    $query = $this->createQueryBuilder('lib');
    if(array_key_exists('name', $datas) && !empty($datas['name'])) {
      if(array_key_exists('nameOptions', $datas) && $datas['nameOptions'] === 'like') {
        $query->where($query->expr()->like('lib.name', $query->expr()->literal('%'.$datas['name'].'%')));
      } elseif (array_key_exists('nameOptions', $datas) && !empty($datas['nameOptions'])) {
        $query->where('lib.name = :name')->setParameter(':name', $datas['name']);
      }
    }
    if(array_key_exists('bookNumber', $datas) && !empty($datas['bookNumber'])) {
      if(array_key_exists('bookOptions', $datas) && $datas['bookOptions'] === 'or') {
        $query->orWhere('lib.book_number >= :book_number')->setParameter(':book_number', $datas['bookNumber']);
      } elseif (array_key_exists('bookOptions', $datas) && !empty($datas['bookOptions'])) {
        $query->andWhere('lib.book_number >= :book_number')->setParameter('book_number', $datas['bookNumber']);
      }
    }
    if (array_key_exists('createdAt', $datas) && !empty($datas['createdAt'])) {
      if (array_key_exists('dateOptions', $datas) && $datas['dateOptions'] === 'or') {
        $query->orWhere('lib.created_at >= :created_at')->setParameter(':created_at', $datas['createdAt']);
      } elseif (array_key_exists('dateOptions', $datas) && !empty($datas['dateOptions'])) {
        $query->andWhere('lib.created_at >= :created_at')->setParameter(':created_at', $datas['createdAt']);
      }
    }
    return $query->getQuery()->getResult();
  }
}