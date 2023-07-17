<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Form\ProfilType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(UserRepository $userRepository, Request $request, RequestStack $requestStack): Response
    {

        $user = $this->getUser();

        $form = $this->createForm(UserType::class, $user);

        $form->setData($user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'Formulaire soumis avec succès !');
            $userRepository->save($user, true);

            return $this->render('profil/index.html.twig', [
                'form' => $form->createView(),
                'user' => $user,
            ]);
        }

        return $this->render('profil/index.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }
}
