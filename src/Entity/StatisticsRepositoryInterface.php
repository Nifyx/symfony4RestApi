<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 08/01/2019
 * Time: 23:49
 */

namespace App\Entity;

/**
 * Interface StatisticsRepositoryInterface
 * @package App\Entity
 */
interface StatisticsRepositoryInterface
{
    /**
     * @param int $statId
     * @return Statistics
     */
    public function findById(int $statId): ?Statistics;
    /**
     * @return array
     */
    public function findAll(): array;
    /**
     * @param Statistics $statistics
     */
    public function save(Statistics $statistics): void;
    /**
     * @param Statistics $statistics
     */
    public function delete(Statistics $statistics): void;
}