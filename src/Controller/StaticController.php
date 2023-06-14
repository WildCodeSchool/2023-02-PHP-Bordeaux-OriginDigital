<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaticController extends AbstractController
{
    #[Route('/legal-notice', name: 'legal-notice')]
    public function indexLegalNotice(): Response
    {
        return $this->render('static-pages/legal-notice.html.twig');
    }

    #[Route('/privacy-policy', name: 'privacy-policy')]
    public function indexPrivacyPolicy(): Response
    {
        return $this->render('static-pages/privacy-policy.html.twig');
    }
}
