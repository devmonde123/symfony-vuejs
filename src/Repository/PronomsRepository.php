<?php

namespace App\Repository;

use App\Entity\Pronoms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Pronoms|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pronoms|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pronoms[]    findAll()
 * @method Pronoms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PronomsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pronoms::class);
    }

    // /**
    //  * @return Pronoms[] Returns an array of Pronoms objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pronoms
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
