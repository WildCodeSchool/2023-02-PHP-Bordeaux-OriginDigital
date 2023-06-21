<?php

namespace App\Services;

use App\Entity\User;
use App\Form\ProfilType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserServices extends AbstractController
{
    #[Route('/{id}/edit', name: 'user_delete', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, UserRepository $userRepository): Response
    {
        $form = $this->createForm(ProfilType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);

            return $this->redirectToRoute('/profil', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('', [
            /*'season' => $season,*/
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_season_c_r_u_d_delete', methods: ['POST'])]
    public function delete(Request $request, Season $season, SeasonRepository $seasonRepository, RequestStack $requestStack): Response
    {
        $session = $requestStack->getSession();

        if ($this->isCsrfTokenValid('delete' . $season->getId(), $request->request->get('_token'))) {
            $seasonRepository->remove($season, true);
        }

        $this->addFlash('success', 'The season has been deleted.');

        return $this->redirectToRoute('app_season_c_r_u_d_index', [], Response::HTTP_SEE_OTHER);
    }
}
