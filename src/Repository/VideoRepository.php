<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Video;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Video>
 *
 * @method Video|null find($id, $lockMode = null, $lockVersion = null)
 * @method Video|null findOneBy(array $criteria, array $orderBy = null)
 * @method Video[]    findAll()
 * @method Video[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Video::class);
    }

    public function save(Video $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Video $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findLikeTitle(string $search): array
    {
        $queryBuilder = $this->createQueryBuilder('v')
            ->where('v.title LIKE :search')
            ->setParameter('search', '%' . $search . '%')
            ->orderBy('v.title', 'ASC')
            ->getQuery();

        return $queryBuilder->getResult();
    }

//    /**
//     * @return Video[] Returns an array of Video objects
//     */
    public function findByPicture(string $picture): array
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.videoPicture = :picture')
            ->setParameter('picture', $picture)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }

    public function findByCategory(?Category $category): array
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.category = :category')
            ->setParameter('category', $category)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult();
    }
}
