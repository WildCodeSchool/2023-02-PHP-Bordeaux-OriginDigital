<?php

namespace App\Controller;

use App\Form\SearchVideoType;
use App\Repository\VideoRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    #[Route('/search/videos', name: 'app_search_video', methods: ['GET', 'POST'])]
    public function searchVideos(Request $request, VideoRepository $videoRepository): Response
    {
        $form = $this->createForm(SearchVideoType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $search = $form->getData()['search'];
            $videos = $videoRepository->findLikeTitle($search);
            if (empty($videos)) {
                $this->addFlash('info', 'Aucun résultat');
            }
        } else {
            $videos = [];
        }

        return $this->render('search/resultVideos.html.twig', [
            'videos' => $videos,
            'form' => $form,
        ]);
    }
}
