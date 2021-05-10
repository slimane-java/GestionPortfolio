<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use App\Entity\Competence;
use App\Entity\Experiences;
use App\Entity\Formation;
use App\Entity\Mession;
use App\Entity\Projet;
use App\Entity\ProjetEntreprise;
use App\Entity\Role;
use App\Entity\TypeCompetence;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio');
    }

    public function configureMenuItems(): iterable
    {
        $submenu1 = [
        MenuItem::linkToCrud('Projet Personnel', 'fas fa-user', Projet::class)->setPermission(Role::ROLE_USER),
        MenuItem::linkToCrud('Projet Entreprise', 'fas fa-user', ProjetEntreprise::class)->setPermission(Role::ROLE_USER)

        ];

        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Client', 'fas fa-user', Client::class)->setPermission(Role::ROLE_USER);
        yield MenuItem::linkToCrud('Formation', 'fas fa-user', Formation::class)->setPermission(Role::ROLE_USER);
        yield MenuItem::linkToCrud('Competences', 'fas fa-user', Competence::class)->setPermission(Role::ROLE_USER);
        yield MenuItem::linkToCrud('TypeCompetence', 'fas fa-user', TypeCompetence::class)->setPermission(Role::ROLE_USER);
        yield MenuItem::linkToCrud('Experience', 'fas fa-user', Experiences::class)->setPermission(Role::ROLE_USER);
        yield MenuItem::subMenu('Projets', 'fas fa-user')->setSubItems($submenu1)->setPermission(Role::ROLE_USER);
        yield MenuItem::linkToCrud('Mession', 'fas fa-user', Mession::class)->setPermission(Role::ROLE_USER);

    }
}
