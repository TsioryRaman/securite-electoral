<?php

namespace App\Repository;

use App\Entity\VotePlace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VotePlace>
 *
 * @method VotePlace|null find($id, $lockMode = null, $lockVersion = null)
 * @method VotePlace|null findOneBy(array $criteria, array $orderBy = null)
 * @method VotePlace[]    findAll()
 * @method VotePlace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VotePlaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VotePlace::class);
    }

//    /**
//     * @return VotePlace[] Returns an array of VotePlace objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VotePlace
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
