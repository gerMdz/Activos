<?php

namespace App\Repository;

use App\Entity\ServiceProviderUsed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServiceProviderUsed|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceProviderUsed|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceProviderUsed[]    findAll()
 * @method ServiceProviderUsed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceProviderUsedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceProviderUsed::class);
    }

    // /**
    //  * @return ServiceProviderUsed[] Returns an array of ServiceProviderUsed objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ServiceProviderUsed
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
