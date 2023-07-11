<?php

namespace App\Controller;

use App\Entity\Video;
use App\Repository\CategoryRepository;
use App\Entity\Advertisement;
use App\Repository\AdvertisementRepository;
use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(VideoRepository $videoRepository, CategoryRepository $categoryRepository, AdvertisementRepository $advertisementRepository,): Response
    {
        $footballPicture = $videoRepository->findByPicture('football1.jpg');
        $tennisPicture = $videoRepository->findByPicture('tennis2.jpg');
        $volleyballPicture = $videoRepository->findByPicture('volleyball1.jpg');

        $premiumVideos = $videoRepository->findBy(
            ['isPremium' => true],
            ['id' => 'ASC'],
            6
        );
        $basketball = $categoryRepository->findOneBy(['name' => 'Basketball']);
        $basketballVideos = $videoRepository->findByCategory($basketball);
        $football = $categoryRepository->findOneBy(['name' => 'Football']);
        $footballVideos = $videoRepository->findByCategory($football);
        $surf = $categoryRepository->findOneBy(['name' => 'Surf']);
        $surfVideos = $videoRepository->findByCategory($surf);

        $advertisementVideos = $advertisementRepository->findAll(
        );

        return $this->render(
            'home/index.html.twig',
            [
                'footballPicture' => $footballPicture,
                'tennisPicture' => $tennisPicture,
                'volleyballPicture' => $volleyballPicture,
                'premiumVideos' => $premiumVideos,
                'basketballVideos' => $basketballVideos,
                'footballVideos' => $footballVideos,
                'surfVideos' => $surfVideos,
                'advertisementVideos' => $advertisementVideos,
            ]
        );
    }
}
