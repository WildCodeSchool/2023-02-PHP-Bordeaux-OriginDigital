<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubscriptionController extends AbstractController
{
    #[Route('/profil/subscription', name: 'app_subscription')]
    public function show(): Response
    {
        return $this->render('subscription.html.twig');
    }
}
