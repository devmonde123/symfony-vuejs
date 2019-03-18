<?php

namespace App\Repository;

use App\Entity\Conjugaisons;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Conjugaisons|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conjugaisons|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conjugaisons[]    findAll()
 * @method Conjugaisons[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConjugaisonsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Conjugaisons::class);
    }

    // /**
    //  * @return Conjugaisons[] Returns an array of Conjugaisons objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Conjugaisons
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
