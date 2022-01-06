<?php

namespace App\Repository;

use App\Entity\ServerData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServerData|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServerData|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServerData[]    findAll()
 * @method ServerData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServerDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServerData::class);
    }

    // /**
    //  * @return ServerData[] Returns an array of ServerData objects
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
    public function findOneBySomeField($value): ?ServerData
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
