<?php

namespace App\Controller\Admin;

use App\Entity\Advertisement;
use App\Entity\Category;
use App\Entity\User;
use App\Entity\Video;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private readonly AdminUrlGenerator $adminUrlGenerator
    ) {
    }

    #[isGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(CategoryCrudController::class)
            ->setController(AdvertisementCrudController::class)
            ->setController(UserCrudController::class)
            ->setController(VideoCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setFaviconPath('build/images/favicon/favicon-16x16.png');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Accueil du site', 'fas fa-home', $this->generateUrl('app_home'));
        yield MenuItem::linkToCrud('Categories', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Membres', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Sponsors', 'fas fa-euro', Advertisement::class);
        yield MenuItem::linkToCrud('Videos', 'fas fa-video', Video::class);
    }

    public function configureAssets(): Assets
    {
        return parent::configureAssets()
        ->addWebpackEncoreEntry('admin');
    }
}
