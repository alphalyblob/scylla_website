<?php

namespace App\Repository;

use App\Entity\ImagesAteliers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImagesAteliers>
 *
 * @method ImagesAteliers|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImagesAteliers|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImagesAteliers[]    findAll()
 * @method ImagesAteliers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagesAteliersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImagesAteliers::class);
    }

//    /**
//     * @return ImagesAteliers[] Returns an array of ImagesAteliers objects
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

//    public function findOneBySomeField($value): ?ImagesAteliers
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
