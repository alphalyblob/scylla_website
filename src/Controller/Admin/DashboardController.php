<?php

namespace App\Controller\Admin;

use App\Entity\Adherent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\AdherentCrudController;
use App\Entity\Ateliers;
use App\Entity\Cours;
use App\Entity\Evenements;
use App\Entity\InfosAdherent;
use App\Entity\InfosAsso;
use App\Entity\Medias;
use App\Entity\MembresEquipe;
use App\Entity\Participants;
use App\Entity\Seances;
use App\Entity\Tarifs;
use App\Entity\TypeEvenement;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(AdherentCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Scylla Website');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Ateliers', 'fas fa-theater-masks', Ateliers::class);
        yield MenuItem::linkToCrud('Cours', 'fas fa-graduation-cap', Cours::class);
        yield MenuItem::linkToCrud('Séances', 'fas fa-calendar-days', Seances::class);
        yield MenuItem::linkToCrud('Evenements', 'fas fa-ticket', Evenements::class);
        yield MenuItem::linkToCrud('Médias', 'fas fa-photo-film', Medias::class);
        yield MenuItem::linkToCrud('Tarifs', 'fas fa-euro-sign', Tarifs::class);


        yield MenuItem::linkToCrud('Infos Adhérents', 'fas fa-address-card', InfosAdherent::class);
        yield MenuItem::linkToCrud('Types d\'évènement', 'fas fa-clapperboard', TypeEvenement::class);
        yield MenuItem::linkToCrud('Participants', 'fas fa-person-circle-check', Participants::class);

        yield MenuItem::linkToCrud('Equipe', 'fas fa-users-between-lines', MembresEquipe::class);
        yield MenuItem::linkToCrud('Infos Scylla', 'fas fa-building', InfosAsso::class);

    }
}
