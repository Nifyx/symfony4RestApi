<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 08/01/2019
 * Time: 23:57
 */

namespace App\Controller;


use App\Entity\Statistics;
use App\Repository\StatisticsRepository;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StatisticsController extends FOSRestController
{
    /**
     * @var StatisticsRepository
     */
    private $statisticsRepository;

    /**
     * Create a Stat resource
     * @Rest\Post("/stat")
     * @param Request $request
     * @return View
     */
    public function postStatistics(Request $request): View
    {
        $stat = new Statistics();
        $stat->setCountry($request->get('country'));
        $stat->setIp($request->get('ip'));
        $this->statisticsRepository->save($stat);

        return View::create($stat, Response::HTTP_CREATED);
    }

    /**
     * Create a Stat resource
     * @Rest\Get("/stat/{statId}")
     * @param int statId
     * @return View
     */
    public function getStatistics(int $statId): View
    {
        $stat = $this->statisticsRepository->findById($statId);

        return View::create($stat, Response::HTTP_OK);
    }
}