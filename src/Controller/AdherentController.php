<?php

namespace App\Controller;

use App\Entity\Adherent;
use App\Form\AdherentType;
use App\Repository\AdherentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

#[Route('/adherent')]
class AdherentController extends AbstractController
{
    #[IsGranted('ROLE_MEMBRE')]
    #[Route('/', name: 'app_adherent_index', methods: ['GET'])]
    public function index(AdherentRepository $adherentRepository): Response
    {
        return $this->render('adherent/index.html.twig', [
            'adherents' => $adherentRepository->findAll(),
        ]);
    }


    #[IsGranted('ROLE_USER')]
    #[Route('/{id}', name: 'app_adherent_show', methods: ['GET'])]
    public function show(Adherent $adherent): Response
    {
        // L'utilisateur ne peut consulter que son propre compte
        if ($this->getUser() !== $adherent) {
            throw new AccessDeniedException("Vous n'êtes pas autorisé à consulter ce profil.");
        }
        return $this->render('adherent/show.html.twig', [
            'adherent' => $adherent,
        ]);
    }




    #[IsGranted('ROLE_USER')]
    #[Route('/{id}/edit', name: 'app_adherent_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Adherent $adherent, EntityManagerInterface $entityManager): Response
    {

        // L'utilisateur ne peut éditer que son propre compte
        if ($this->getUser() !== $adherent) {
            throw new AccessDeniedException("Vous n'êtes pas autorisé à éditer ce profil.");
        }
        


        $form = $this->createForm(AdherentType::class, $adherent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_adherent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('adherent/edit.html.twig', [
            'adherent' => $adherent,
            'form' => $form,
        ]);
    }



    
    #[IsGranted('ROLE_USER')]
    #[Route('/{id}', name: 'app_adherent_delete', methods: ['POST'])]
    public function delete(Request $request, Adherent $adherent, EntityManagerInterface $entityManager): Response
    {

        // L'utilisateur ne peut  supprimer que son propre compte
        if ($this->getUser() !== $adherent) {
            throw new AccessDeniedException("Vous n'êtes pas autorisé à supprimer ce profil.");
        }


        if ($this->isCsrfTokenValid('delete'.$adherent->getId(), $request->request->get('_token'))) {
            $entityManager->remove($adherent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_adherent_index', [], Response::HTTP_SEE_OTHER);
    }
}
