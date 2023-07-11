<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
//    #[Route('/category/{id}', name: 'app_category')]
//    public function index(Category $category): Response
//    {
//        return $this->render('categoryPage/showVideosByCategory.html.twig', [
//            'category' => $category,
//        ]);
//    }

    #[Route('/category/{id}', name: 'app_category')]
    public function index(Category $category, VideoRepository $videoRepository, Request $request): Response
    {
        //Récupération du numéro de page dans l'URL
        $page = $request->query->getInt('page', 1);

        $video = $videoRepository->findVideosPaginated($page, $category->getName(), 4);

        return $this->render('categoryPage/showVideosByCategory.html.twig', [
            'category' => $category,
            'video' => $video
        ]);
    }
}
