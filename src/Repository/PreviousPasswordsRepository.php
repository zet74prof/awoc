<?php

namespace App\Repository;

use App\Entity\PreviousPasswords;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PreviousPasswords>
 *
 * @method PreviousPasswords|null find($id, $lockMode = null, $lockVersion = null)
 * @method PreviousPasswords|null findOneBy(array $criteria, array $orderBy = null)
 * @method PreviousPasswords[]    findAll()
 * @method PreviousPasswords[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PreviousPasswordsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PreviousPasswords::class);
    }

//    /**
//     * @return PreviousPasswords[] Returns an array of PreviousPasswords objects
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

//    public function findOneBySomeField($value): ?PreviousPasswords
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
