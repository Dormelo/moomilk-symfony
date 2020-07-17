<?php

namespace App\Controller\Admin;

use App\Entity\Cow;
use App\Entity\User;
use App\Entity\Milking;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/", name="app_admin_dashboard_index")
     */
    public function index(): Response
    {
        if (! $this->getUser()) {
             return $this->redirectToRoute('app_login');
         }

        $cowListUrl = $this->get(CrudUrlGenerator::class)->build()->setController(CowCrudController::class)->generateUrl();

        return $this->redirect($cowListUrl);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('User', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Cow', 'fas fa-th-list', Cow::class);
        yield MenuItem::linkToCrud('Milking', 'fas fa-thermometer-three-quarters', Milking::class)->setDefaultSort(['createdAt' => 'DESC']);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MooProject')
            ;
    }
}