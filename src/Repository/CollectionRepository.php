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
   * @param $ids
   * @return Collection[]
   */
    public function findCollections($locale, $ids)
    {
      return $this->createQueryBuilder('c')
        ->select('c', 'e', 'cc', 'm')
        ->join('c.elements', 'e')
        ->leftJoin('c.contents', 'cc')
        ->leftJoin('c.media', 'm')
        ->where('e.id IN(:element_ids)')
        ->setParameter('element_ids', $ids)
        ->andWhere('cc.locale = :locale')
        ->setParameter('locale', $locale)
        ->getQuery()
        ->getArrayResult();
    }
}
