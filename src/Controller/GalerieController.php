<?php

namespace App\Controller;


use App\Repository\ImagesCoursRepository;
use App\Repository\ImagesAteliersRepository;
use App\Repository\ImagesEvenementsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GalerieController extends AbstractController
{
    #[Route('/galerie', name: 'app_galerie_index')]
    public function index(ImagesCoursRepository $imagesCoursRepository, ImagesAteliersRepository $imagesAteliersRepository, ImagesEvenementsRepository $imagesEvenementsRepository): Response
    {
        return $this->render('galerie/index.html.twig', [
            
            'ev_images' => $imagesEvenementsRepository->findAll(),
            'co_images' => $imagesCoursRepository->findAll(),
        ]);
    }
    
}