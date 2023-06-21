<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideoController extends AbstractController
{
    #[Route('/video/{id}', name: 'app_video')]
    public function showVideo(Video $video): Response
    {
        return $this->render('video/showSelectedVideo.html.twig', [
            'video' =>  $video,
        ]);
    }
}
