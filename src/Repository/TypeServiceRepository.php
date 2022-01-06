<?php

namespace App\Repository;

use App\Entity\TypeService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeService|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeService|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeService[]    findAll()
 * @method TypeService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeService::class);
    }

    // /**
    //  * @return TypeService[] Returns an array of TypeService objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeService
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
