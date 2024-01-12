<?php

namespace App\Repository;

use App\Entity\ParticipantsEvenements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ParticipantsEvenements>
 *
 * @method ParticipantsEvenements|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParticipantsEvenements|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParticipantsEvenements[]    findAll()
 * @method ParticipantsEvenements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParticipantsEvenementsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParticipantsEvenements::class);
    }

//    /**
//     * @return ParticipantsEvenements[] Returns an array of ParticipantsEvenements objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ParticipantsEvenements
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
