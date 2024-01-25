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
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

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
    public function show(Adherent $adherent, TokenStorageInterface $tokenStorage): Response
    {
        $user = $tokenStorage->getToken()->getUser();
        // Si l'adherent connecté n'est pas l'adherent visé alors acces refusé
        if ($user !== $adherent) {
            throw new AccessDeniedException("Vous n'êtes pas autorisé à consulter ce profil.");
        }
        return $this->render('adherent/show.html.twig', [
            'adherent' => $adherent,
        ]);
    }




    #[IsGranted('ROLE_USER')]
    #[Route('/{id}/edit', name: 'app_adherent_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Adherent $adherent, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher, TokenStorageInterface $tokenStorage): Response
    {
        $user = $tokenStorage->getToken()->getUser();
        // Si l'adherent connecté n'est pas l'adherent visé alors acces refusé
        if ($user !== $adherent) {
            throw new AccessDeniedException("Vous n'êtes pas autorisé à éditer ce profil.");
        }
        


        $form = $this->createForm(AdherentType::class, $adherent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            
            $adherent->setPassword($passwordHasher->hashPassword($adherent, $adherent->getPassword()));
            
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
    public function delete(Request $request, Adherent $adherent, EntityManagerInterface $entityManager, TokenStorageInterface $tokenStorage): Response
    {

        $user = $tokenStorage->getToken()->getUser();
        // L'adherent ne peut supprimer que son compte si il est bien l'adherent connecté
        if ($user !== $adherent) {
            throw new AccessDeniedException("Vous n'êtes pas autorisé à supprimer ce compte.");
        }


        if ($this->isCsrfTokenValid('delete'.$adherent->getId(), $request->request->get('_token'))) {
            $entityManager->remove($adherent);
            $entityManager->flush();

            // Déconnexion manuelle de l'adhérent après la suppression pour éviter les conflits de redirection
            $tokenStorage->setToken(null);
            $request->getSession()->invalidate();
        }

        return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
    }
}
