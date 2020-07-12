<?php

namespace App\Repository;

use App\Entity\Cow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cow|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cow|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cow[]    findAll()
 * @method Cow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cow::class);
    }

    // /**
    //  * @return Cow[] Returns an array of Cow objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cow
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
