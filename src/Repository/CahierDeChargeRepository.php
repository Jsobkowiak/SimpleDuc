<?php

namespace App\Repository;

use App\Entity\CahierDeCharge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CahierDeCharge>
 *
 * @method CahierDeCharge|null find($id, $lockMode = null, $lockVersion = null)
 * @method CahierDeCharge|null findOneBy(array $criteria, array $orderBy = null)
 * @method CahierDeCharge[]    findAll()
 * @method CahierDeCharge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CahierDeChargeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CahierDeCharge::class);
    }

    public function save(CahierDeCharge $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CahierDeCharge $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CahierDeCharge[] Returns an array of CahierDeCharge objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CahierDeCharge
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
