<?php

namespace App\Repository;

use App\Entity\ServiceManager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServiceManager|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceManager|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceManager[]    findAll()
 * @method ServiceManager[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceManagerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceManager::class);
    }

    // /**
    //  * @return ServiceManager[] Returns an array of ServiceManager objects
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
    public function findOneBySomeField($value): ?ServiceManager
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
