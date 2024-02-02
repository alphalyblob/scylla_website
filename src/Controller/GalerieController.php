<?php

namespace App\Controller;


use App\Repository\ImagesCoursRepository;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\ImagesAteliersRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ImagesEvenementsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class GalerieController extends AbstractController
{
    #[Route('/galerie', name: 'app_galerie_index')]
    public function index(ImagesCoursRepository $imagesCoursRepository, ImagesAteliersRepository $imagesAteliersRepository, ImagesEvenementsRepository $imagesEvenementsRepository, PaginatorInterface $paginatorInterface, Request $request): Response
    {
        $evdata = $imagesEvenementsRepository->findAll();
        $ev_images = $paginatorInterface->paginate(
            $evdata,
            $request->query->getInt('page', 1),
            2
        );
        $codata = $imagesCoursRepository->findAll();
        $co_images = $paginatorInterface->paginate(
            $codata,
            $request->query->getInt('page', 1),
            2
        );
        return $this->render('galerie/index.html.twig', [
            
            'ev_images' => $ev_images,
            'co_images' => $co_images,
        ]);
    }
    
}