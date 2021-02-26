<?php

namespace App\Controller\Admin;

use App\Entity\Student;
use App\Entity\Project;
use App\Entity\SchoolYear;
use App\Entity\Tag;
use App\Controller\Admin\SchoolYearCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
    // redirect to some CRUD controller
    $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

    return $this->redirect($routeBuilder->setController(SchoolYearCrudController::class)->generateUrl());   
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Student Api');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Students', 'fas fa-user-graduate', Student::class);
        yield MenuItem::linkToCrud('Projects', 'fas fa-project-diagram', Project::class);
        yield MenuItem::linkToCrud('SchoolYears', 'fas fa-calendar-alt', SchoolYear::class);
        yield MenuItem::linkToCrud('Tags', 'fas fa-tags', Tag::class);
    }
}

