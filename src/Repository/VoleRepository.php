<?php

namespace App\Repository;

use App\Entity\Vole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Vole|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vole|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vole[]    findAll()
 * @method Vole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Vole::class);
    }

    // /**
    //  * @return Vole[] Returns an array of Vole objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vole
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
