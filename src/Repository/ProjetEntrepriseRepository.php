<?php

namespace App\Repository;

use App\Entity\ProjetEntreprise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProjetEntreprise|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjetEntreprise|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjetEntreprise[]    findAll()
 * @method ProjetEntreprise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjetEntrepriseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjetEntreprise::class);
    }

    // /**
    //  * @return ProjetEntreprise[] Returns an array of ProjetEntreprise objects
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
    public function findOneBySomeField($value): ?ProjetEntreprise
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
