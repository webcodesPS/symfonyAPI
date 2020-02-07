<?php

namespace App\Repository;

use App\Entity\Page;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Page|null find($id, $lockMode = null, $lockVersion = null)
 * @method Page|null findOneBy(array $criteria, array $orderBy = null)
 * @method Page[]    findAll()
 * @method Page[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Page::class);
    }

    /**
     * @return Page[] Returns an array of Page objects
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findPage($locale, $page = '')
    {
      $qb = $this->createQueryBuilder('p')
          ->select('p', 't')
          ->where('p.enabled = 1');

      if ($page) {
        $qb->andWhere('p.slug = :slug')
          ->setParameter('slug', $page);
      } else
        $qb->andWhere('p.id = 1');

      $qb->leftJoin('p.contents', 't')
        ->andWhere('t.locale = :locale')
        ->setParameter('locale', $locale)
        ->orderBy('t.position', 'ASC');

      return $qb->getQuery()->getArrayResult();
    }
}
