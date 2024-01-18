<?php

namespace App\Repository;

use App\Entity\ImagesEvenements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImagesEvenements>
 *
 * @method ImagesEvenements|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImagesEvenements|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImagesEvenements[]    findAll()
 * @method ImagesEvenements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagesEvenementsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImagesEvenements::class);
    }

//    /**
//     * @return ImagesEvenements[] Returns an array of ImagesEvenements objects
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

//    public function findOneBySomeField($value): ?ImagesEvenements
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
