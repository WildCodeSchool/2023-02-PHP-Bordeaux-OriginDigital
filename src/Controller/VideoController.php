<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Video;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideoController extends AbstractController
{
    #[Route('/video/{id}', name: 'app_video')]
    public function showVideo(Video $video): Response
    {
        return $this->render('video/showSelectedVideo.html.twig', [
            'video' => $video,
        ]);
    }

    #[Route('/like/video/{id}', name: 'app_like_video')]
    public function like(Video $video, EntityManagerInterface $manager): JsonResponse
    {
        /** @var User $user */
        $user = $this->getUser();

        if ($user !== null) {
            $likedVideos = $user->getLikes();

            if ($likedVideos->contains($video)) {
                $likedVideos->removeElement($video);
                $manager->flush();

                return new JsonResponse(['message' => 'Video bien supprimé de vos favoris!', 'liked' => false]);
            }

            $likedVideos->add($video);
            $manager->flush();

            return new JsonResponse(['message' => 'Video bien ajouté à vos favoris!', 'liked' => true]);
        }

        return new JsonResponse(['message' => 'User not authenticated.']);
    }
}
