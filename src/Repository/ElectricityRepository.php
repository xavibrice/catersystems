<?php

namespace App\Repository;

use App\Entity\Electricity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Electricity|null find($id, $lockMode = null, $lockVersion = null)
 * @method Electricity|null findOneBy(array $criteria, array $orderBy = null)
 * @method Electricity[]    findAll()
 * @method Electricity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElectricityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Electricity::class);
    }

    // /**
    //  * @return Electricity[] Returns an array of Electricity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Electricity
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
