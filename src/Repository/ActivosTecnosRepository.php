<?php

namespace App\Repository;

use App\Entity\ActivosTecnos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActivosTecnos|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActivosTecnos|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActivosTecnos[]    findAll()
 * @method ActivosTecnos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivosTecnosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActivosTecnos::class);
    }

    // /**
    //  * @return ActivosTecnos[] Returns an array of ActivosTecnos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ActivosTecnos
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
