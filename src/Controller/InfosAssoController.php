<?php

namespace App\Controller;

use App\Entity\InfosAsso;
use App\Form\InfosAssoType;
use App\Repository\InfosAssoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/infos/asso')]
class InfosAssoController extends AbstractController
{
    #[Route('/', name: 'app_infos_asso_index', methods: ['GET'])]
    public function index(InfosAssoRepository $infosAssoRepository): Response
    {
        return $this->render('infos_asso/index.html.twig', [
            'infos_assos' => $infosAssoRepository->findAll(),
        ]);
    }

    #[Route('/contact', name: 'app_contact', methods: ['GET'])]
    public function contact(InfosAssoRepository $infosAssoRepository): Response
    {
        return $this->render('infos_asso/contact.html.twig', [
            'infos_assos' => $infosAssoRepository->findAll(),
        ]);
    }


    
}
