<?php

namespace App\Repository;

use App\Entity\MembresEquipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MembresEquipe>
 *
 * @method MembresEquipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method MembresEquipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method MembresEquipe[]    findAll()
 * @method MembresEquipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MembresEquipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MembresEquipe::class);
    }

//    /**
//     * @return MembresEquipe[] Returns an array of MembresEquipe objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MembresEquipe
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
