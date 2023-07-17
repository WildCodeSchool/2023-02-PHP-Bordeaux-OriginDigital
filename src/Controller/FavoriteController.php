<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Video;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FavoriteController extends AbstractController
{
    #[Route('/favoris/', name: 'app_favorites')]
    public function index(): Response
    {
        return $this->render('favorites.html.twig');
    }

    #[Route('/like/video/{id}', name: 'app_like_video')]
    public function like(Video $video, EntityManagerInterface $manager): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        if ($user !== null) {
            $likedVideos = $user->getLikes();

            if ($likedVideos->contains($video)) {
                $likedVideos->removeElement($video);
                $manager->flush();

                return $this->json(['code' => 200, 'message' => 'Supprimé'], 200);
            }

            $likedVideos->add($video);
            $manager->flush();

            return $this->json(['code' => 200, 'message' => 'Ajouté'], 200);
        }

        return $this->json(['code' => 403,
            'message' => 'Vous devrez etre connecté pour ajouter des videos au favorits!'], 403);
    }
}
