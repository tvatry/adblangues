<?php

namespace App\Repository;

use App\Entity\AnswerImport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnswerImport|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnswerImport|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnswerImport[]    findAll()
 * @method AnswerImport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnswerImportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnswerImport::class);
    }

    // /**
    //  * @return AnswerImport[] Returns an array of AnswerImport objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AnswerImport
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
