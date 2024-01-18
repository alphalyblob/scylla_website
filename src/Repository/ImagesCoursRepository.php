<?php

namespace App\Repository;

use App\Entity\ImagesCours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImagesCours>
 *
 * @method ImagesCours|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImagesCours|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImagesCours[]    findAll()
 * @method ImagesCours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagesCoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImagesCours::class);
    }

//    /**
//     * @return ImagesCours[] Returns an array of ImagesCours objects
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

//    public function findOneBySomeField($value): ?ImagesCours
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
