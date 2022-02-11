<?php

namespace App\Repository;

use App\Entity\EventSizeType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventSizeType|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventSizeType|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventSizeType[]    findAll()
 * @method EventSizeType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventSizeTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventSizeType::class);
    }

    // /**
    //  * @return EventSizeType[] Returns an array of EventSizeType objects
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
    public function findOneBySomeField($value): ?EventSizeType
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
