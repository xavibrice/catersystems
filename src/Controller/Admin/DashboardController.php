<?php

namespace App\Controller\Admin;

use App\Entity\Electricity;
use App\Entity\Installation;
use App\Entity\Material;
use App\Entity\TypeMaterial;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $url = null;
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        //return $this->redirect($routeBuilder->setController(OneOfYourCrudController::class)->generateUrl());
        if ($this->isGranted('ROLE_TELECOMMUNICATIONS')) {
            $url = $this->redirect($routeBuilder->setController(InstallationCrudController::class)->generateUrl());
        }

        if ($this->isGranted('ROLE_ELECTRICITY')) {
            $url = $this->redirect($routeBuilder->setController(ElectricityCrudController::class)->generateUrl());
        }

        if ($this->isGranted('ROLE_ADMIN')) {
            $url = $this->redirect($routeBuilder->setController(ElectricityCrudController::class)->generateUrl());
        }

        return $url;
        //return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Catersystems');
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Usuarios', 'fas fa-users', User::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Tipo Material', 'fas fa-users', TypeMaterial::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Material', 'fas fa-users', Material::class)->setPermission('ROLE_TELECOMMUNICATIONS');
        yield MenuItem::linkToCrud('Instalación', 'fas fa-users', Installation::class)->setDefaultSort(['created' => 'ASC'])->setPermission('ROLE_TELECOMMUNICATIONS');
        yield MenuItem::linkToCrud('Electricidad', 'fas fa-users', Electricity::class)->setDefaultSort(['created' => 'ASC'])->setPermission('ROLE_ELECTRICITY');
    }
}
