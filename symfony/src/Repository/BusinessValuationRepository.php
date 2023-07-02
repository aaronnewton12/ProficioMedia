<?php

namespace App\Repository;

use App\Entity\BusinessValuation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BusinessValuation|null find($id, $lockMode = null, $lockVersion = null)
 * @method BusinessValuation|null findOneBy(array $criteria, array $orderBy = null)
 * @method BusinessValuation[]    findAll()
 * @method BusinessValuation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BusinessValuationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BusinessValuation::class);
    }

    // /**
    //  * @return BusinessValuation[] Returns an array of BusinessValuation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BusinessValuation
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
