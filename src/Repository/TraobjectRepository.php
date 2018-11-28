<?php

namespace App\Repository;

use App\Entity\State;
use App\Entity\Traobject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Traobject|null find($id, $lockMode = null, $lockVersion = null)
 * @method Traobject|null findOneBy(array $criteria, array $orderBy = null)
 * @method Traobject[]    findAll()
 * @method Traobject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TraobjectRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Traobject::class);
    }

    public function findLastTraobjectByState(string $state, int $limit)
    {
        $qb = $this->createQueryBuilder('t');

        $qb = $qb->select('t', 's')
            ->where($qb->expr()->eq('s.label', ':state'))
            ->innerJoin('t.state', 's')
            ->orderBy('t.createdAt', 'DESC')
            ->setMaxResults($limit);

        return $qb->setParameter(':state', $state)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();


    }

    public function findTraobjectByState(string $state)
    {
        $qb = $this->createQueryBuilder('t');

        $qb = $qb->select('t', 's')
            ->where($qb->expr()->eq('s.label', ':state'))
            ->innerJoin('t.state', 's')
            ->orderBy('t.createdAt', 'DESC');

        return $qb->setParameter(':state', $state)
            ->getQuery()
            ->getResult();


    }

    // /**
    //  * @return Traobject[] Returns an array of Traobject objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Traobject
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
