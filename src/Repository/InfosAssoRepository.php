<?php

namespace App\Repository;

use App\Entity\InfosAsso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InfosAsso>
 *
 * @method InfosAsso|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfosAsso|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfosAsso[]    findAll()
 * @method InfosAsso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfosAssoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InfosAsso::class);
    }

//    /**
//     * @return InfosAsso[] Returns an array of InfosAsso objects
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

//    public function findOneBySomeField($value): ?InfosAsso
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
