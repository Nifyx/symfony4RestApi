<?php

namespace App\Repository;

use App\Entity\Statistics;
use App\Entity\StatisticsRepositoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class StatisticsRepository
 * @package App\Repository
 */
final class StatisticsRepository implements StatisticsRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var ObjectRepository
     */
    private $objectRepository;

    /**
     * StatisticsRepository constructor.
     * @param StatisticsRepositoryInterface $entityManager
     */
    public function __construct(StatisticsRepositoryInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->objectRepository = $this->entityManager->getRepository(Statistics::class);
    }

    /**
     * @param int $statId
     * @return Statistics
     */
    public function findById(int $statId): ?Statistics
    {
        return $this->objectRepository->find($statId);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->objectRepository->findAll();
    }

    /**
     * @param Statistics $statistics
     */
    public function save(Statistics $statistics): void
    {
        $this->entityManager->save($statistics);
        $this->entityManager->flush();
    }
    /**
     * @param Statistics $statistics
     */
    public function delete(Statistics $statistics): void
    {
        $this->entityManager->remove($statistics);
        $this->entityManager->flush();
    }
}
