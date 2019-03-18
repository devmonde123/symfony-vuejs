<?php

namespace App\Repository;

use App\Entity\Verbs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Verbs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Verbs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Verbs[]    findAll()
 * @method Verbs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VerbsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Verbs::class);
    }

     /**
      * @return Verbs[] Returns an array of Verbs objects
      */
    
    public function findAllQuery(): Query
    {
        return $this->createQueryBuilder('v')
            #->andWhere('v.exampleField = :val')
            #->setParameter('val', $value)
            #->orderBy('v.id', 'ASC')
            #->setMaxResults(10)
            ->getQuery()
            #->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Verbs
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
