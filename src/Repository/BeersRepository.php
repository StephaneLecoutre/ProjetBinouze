<?php

namespace App\Repository;

use App\Entity\Beers;
use App\Entity\BeerSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Beers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Beers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Beers[]    findAll()
 * @method Beers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BeersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Beers::class);
    }

    /**
     * @param BeerSearch $search
     * @return Query
     */
    public function findAllVisibleQuery(BeerSearch $search) : Query
    {
        $query = $this->findAllQuery();

        if ($search->getName()) {
            $query = $query
                ->andWhere('beers.name = :name')
                ->setParameter('name', $search->getName());
        }

        if ($search->getType()) {
            $query = $query
                ->andWhere('beers.type = :type')
                ->setParameter('type', $search->getType());
        }

        if ($search->getBrewery()) {
            $query = $query
                ->andWhere('beers.brewery = :brewery')
                ->setParameter('brewery', $search->getBrewery());
        }

        if ($search->getCity()) {
            $query = $query
                ->andWhere('beers.city = :city')
                ->setParameter('city', $search->getCity());
        }

        return $query->getQuery();

    }

    private function findAllQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('beers');
    }

    // /**
    //  * @return Beers[] Returns an array of Beers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Beers
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
