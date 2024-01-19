<?php

namespace App\Controller;

use App\Entity\InfosAdherent;
use App\Form\InfosAdherentType;
use App\Repository\InfosAdherentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/infos/adherent')]
class InfosAdherentController extends AbstractController
{
    #[Route('/', name: 'app_infos_adherent_index', methods: ['GET'])]
    public function index(InfosAdherentRepository $infosAdherentRepository): Response
    {
        return $this->render('infos_adherent/index.html.twig', [
            'infos_adherents' => $infosAdherentRepository->findAll(),
        ]);
    }

    // #[Route('/new', name: 'app_infos_adherent_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     $infosAdherent = new InfosAdherent();
    //     $form = $this->createForm(InfosAdherentType::class, $infosAdherent);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->persist($infosAdherent);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_infos_adherent_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('infos_adherent/new.html.twig', [
    //         'infos_adherent' => $infosAdherent,
    //         'form' => $form,
    //     ]);
    // }

    #[Route('/{id}', name: 'app_infos_adherent_show', methods: ['GET'])]
    public function show(InfosAdherent $infosAdherent): Response
    {
        return $this->render('infos_adherent/show.html.twig', [
            'infos_adherent' => $infosAdherent,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_infos_adherent_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, InfosAdherent $infosAdherent, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(InfosAdherentType::class, $infosAdherent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_infos_adherent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('infos_adherent/edit.html.twig', [
            'infos_adherent' => $infosAdherent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_infos_adherent_delete', methods: ['POST'])]
    public function delete(Request $request, InfosAdherent $infosAdherent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infosAdherent->getId(), $request->request->get('_token'))) {
            $entityManager->remove($infosAdherent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_infos_adherent_index', [], Response::HTTP_SEE_OTHER);
    }
}
