<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaticController extends AbstractController
{
    #[Route('/legal-notice', name: 'legal-notice')]
    public function index(): Response
    {
        return $this->render('static-pages/legal-notice.html.twig');
    }













    #[Route('/cgv', name: 'cgv')]
    public function indexCGV(): Response
    {
        return $this->render('static-pages/cgv.html.twig');
    }
}
