<?php

namespace App\Repository;

use App\Entity\Milking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Milking|null find($id, $lockMode = null, $lockVersion = null)
 * @method Milking|null findOneBy(array $criteria, array $orderBy = null)
 * @method Milking[]    findAll()
 * @method Milking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MilkingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Milking::class);
    }

    // /**
    //  * @return Milking[] Returns an array of Milking objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Milking
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
