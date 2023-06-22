<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category/{id}', name: 'app_category')]
    public function index(Category $category): Response
    {
        return $this->render('categoryPage/showVideosByCategory.html.twig', [
            'category' => $category,
        ]);
    }
}
