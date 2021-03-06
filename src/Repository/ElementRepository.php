<?php

namespace App\Repository;

use App\Entity\Element;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Element|null find($id, $lockMode = null, $lockVersion = null)
 * @method Element|null findOneBy(array $criteria, array $orderBy = null)
 * @method Element[]    findAll()
 * @method Element[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElementRepository extends ServiceEntityRepository
{
  public function __construct(ManagerRegistry $registry)
  {
    parent::__construct($registry, Element::class);
  }

  /**
   * @return Element[] Returns an array of Element objects
   */
  public function findElements($locale)
  {
    return $this->createQueryBuilder('e')
      ->select('e', 'ec')
      ->leftJoin('e.contents', 'ec')
      ->andWhere('ec.locale = :locale')
      ->setParameter('locale', $locale)
      ->getQuery()
      ->getArrayResult();
  }
}
