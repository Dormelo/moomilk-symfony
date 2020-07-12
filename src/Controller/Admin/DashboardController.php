<?php

namespace App\Controller\Admin;

use App\Entity\Cow;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin")
     */
    public function index(): Response
    {
        $cowListUrl = $this->get(CrudUrlGenerator::class)->build()->setController(CowCrudController::class)->generateUrl();

        return $this->redirect($cowListUrl);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Cow', 'fas fa-th-list', Cow::class);
        yield MenuItem::linkToCrud('User', 'fas fa-users', User::class);
    }
}