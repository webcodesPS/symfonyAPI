<?php

namespace App\Repository;

use App\Entity\Menu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Menu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Menu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Menu[]    findAll()
 * @method Menu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Menu::class);
    }

  /**
   * @param $locale
   * @return Menu[]
   */
  public function findMenu($locale): array
  {
    return $this->createQueryBuilder('m')
      ->select('m', 'p', 't')
      ->leftJoin('m.page', 'p')
      ->leftJoin('m.contents', 't')
      ->where('m.enabled = 1')
      ->andWhere('t.locale = :locale')
      ->setParameter('locale', $locale)
      ->orderBy('m.left', 'ASC')
      ->getQuery()
      ->getArrayResult();
  }
}
