<?php

namespace App\Repository;

use App\Entity\DataUser;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DataUser>
 */
class DataUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DataUser::class);
    }

    /**
     * Trouve les données d'un utilisateur spécifique
     */
    public function findByUser(User $user): ?DataUser
    {
        return $this->findOneBy(['user' => $user]);
    }

    /**
     * Recherche par nom complet
     */
    public function searchByName(string $query): array
    {
        return $this->createQueryBuilder('d')
            ->where('d.firstName LIKE :query OR d.lastName LIKE :query')
            ->setParameter('query', '%' . $query . '%')
            ->orderBy('d.lastName', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve les utilisateurs par tranche d'âge
     */
    public function findByAgeRange(int $minAge, int $maxAge): array
    {
        $now = new \DateTime();
        $maxDate = (clone $now)->modify("-{$minAge} years");
        $minDate = (clone $now)->modify("-{$maxAge} years");

        return $this->createQueryBuilder('d')
            ->where('d.birthDate BETWEEN :minDate AND :maxDate')
            ->setParameter('minDate', $minDate)
            ->setParameter('maxDate', $maxDate)
            ->orderBy('d.birthDate', 'DESC')
            ->getQuery()
            ->getResult();
    }

    //    /**
    //     * @return DataUser[] Returns an array of DataUser objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('d.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?DataUser
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}