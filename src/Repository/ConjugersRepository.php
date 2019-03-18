<?php

namespace App\Repository;

use App\Entity\Conjugers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Conjugers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conjugers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conjugers[]    findAll()
 * @method Conjugers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConjugersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Conjugers::class);
    }

    // /**
    //  * @return Conjugers[] Returns an array of Conjugers objects
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
    public function findOneBySomeField($value): ?Conjugers
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
