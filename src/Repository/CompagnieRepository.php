<?php

namespace App\Repository;

use App\Entity\Compagnie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Compagnie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Compagnie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Compagnie[]    findAll()
 * @method Compagnie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompagnieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Compagnie::class);
    }

    // /**
    //  * @return Compagnie[] Returns an array of Compagnie objects
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
    public function findOneBySomeField($value): ?Compagnie
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
