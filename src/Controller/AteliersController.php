<?php

namespace App\Controller;

use App\Entity\Ateliers;
use App\Form\AteliersType;
use App\Repository\AteliersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ateliers')]
class AteliersController extends AbstractController
{
    #[Route('/', name: 'app_ateliers_index', methods: ['GET'])]
    public function index(AteliersRepository $ateliersRepository): Response
    {
        return $this->render('ateliers/index.html.twig', [
            'ateliers' => $ateliersRepository->findAll(),
        ]);
    }


    #[Route('/{id}', name: 'app_ateliers_show', methods: ['GET'])]
    public function show(Ateliers $atelier): Response
    {
        return $this->render('ateliers/show.html.twig', [
            'atelier' => $atelier,
        ]);
    }

}
