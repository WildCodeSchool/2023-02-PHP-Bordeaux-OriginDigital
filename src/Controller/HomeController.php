<?php

namespace App\Controller;

use App\Entity\Advertisement;
use App\Repository\AdvertisementRepository;
use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        VideoRepository $videoRepository,
        AdvertisementRepository $advertisementRepository,
    ): Response {
        $carouselVideos = $videoRepository->findBy(
            [],
            ['id' => 'DESC'],
            3
        );
        shuffle($carouselVideos);

        $premiumVideos = $videoRepository->findBy(
            ['isPremium' => true],
            ['id' => 'ASC'],
            6
        );
        $basketballVideos = $videoRepository->findBy(
            ['category' => 1],
            ['id' => 'ASC'],
            6
        );
        $footballVideos = $videoRepository->findBy(
            ['category' => 2],
            ['id' => 'ASC'],
            6
        );
        $surfVideos = $videoRepository->findBy(
            ['category' => 3],
            ['id' => 'ASC'],
            6
        );

        $advertisementVideos = $advertisementRepository->findAll(
        );

        return $this->render(
            'home/index.html.twig',
            [
                'carouselVideos' => $carouselVideos,
                'premiumVideos' => $premiumVideos,
                'basketballVideos' => $basketballVideos,
                'footballVideos' => $footballVideos,
                'surfVideos' => $surfVideos,
                'advertisementVideos' => $advertisementVideos,
            ]
        );
    }
}
