<?php

namespace App\Repository;

use App\Entity\InfosAdherent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InfosAdherent>
 *
 * @method InfosAdherent|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfosAdherent|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfosAdherent[]    findAll()
 * @method InfosAdherent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfosAdherentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InfosAdherent::class);
    }

//    /**
//     * @return InfosAdherent[] Returns an array of InfosAdherent objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?InfosAdherent
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
