<?php

namespace App\Controller;


use App\Repository\ReseauxRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReseauxController extends AbstractController
{
    #[Route('/reseaux', name: 'app_reseaux')]
    public function index(ReseauxRepository $reseaux): Response
    {
        return $this->render('reseaux/index.html.twig', [
            'reseaux' => $reseaux->findAll(),
        ]);
    }
}
