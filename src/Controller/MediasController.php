<?php

namespace App\Controller;

use App\Entity\Medias;
use App\Form\MediasType;
use App\Repository\MediasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/medias')]
class MediasController extends AbstractController
{
    #[Route('/', name: 'app_medias_index', methods: ['GET'])]
    public function index(MediasRepository $mediasRepository): Response
    {
        return $this->render('medias/index.html.twig', [
            'medias' => $mediasRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_medias_show', methods: ['GET'])]
    public function show(Medias $media): Response
    {
        return $this->render('medias/show.html.twig', [
            'media' => $media,
        ]);
    }
}
