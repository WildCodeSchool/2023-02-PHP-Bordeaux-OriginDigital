<?php

namespace App\Services;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserServices extends AbstractController
{
    #[Route('/users/{id}/delete', name: 'user_delete', methods: ['POST'])]
    public function delete(User $user): Response
    {
        // Supprimer l'utilisateur
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

        $this->addFlash('success', 'Utilisateur supprimé avec succès.');

        return $this->redirectToRoute('/login');
    }
}

