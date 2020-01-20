<?php

namespace App\Repository;

use App\Entity\Collection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Collection|null find($id, $lockMode = null, $lockVersion = null)
 * @method Collection|null findOneBy(array $criteria, array $orderBy = null)
 * @method Collection[]    findAll()
 * @method Collection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CollectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Collection::class);
    }


  /**
   * @param $locale
   * @return Collection[]
   */
    public function findCollections($locale, $ids)
    {
      return $this->createQueryBuilder('c')
        ->select('c', 'e', 'ec', 'm')
        ->join('c.elements', 'e')
        ->leftJoin('e.contents', 'ec')
        ->leftJoin('c.media', 'm')
        ->where('e.id IN(:element_ids)')
        ->setParameter('element_ids', $ids)
        ->andWhere('ec.locale = :locale')
        ->setParameter('locale', $locale)
        ->getQuery()
        ->getArrayResult();
    }
}
