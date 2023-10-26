<?php

namespace App\Controller;

use App\Entity\Libelle;
use App\Form\LibelleType;
use App\Repository\LibelleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/libelle')]
class LibelleController extends AbstractController
{
    #[Route('/', name: 'app_libelle_index', methods: ['GET'])]
    public function index(LibelleRepository $libelleRepository): Response
    {
        return $this->render('libelle/index.html.twig', [
            'libelles' => $libelleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_libelle_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $libelle = new Libelle();
        $form = $this->createForm(LibelleType::class, $libelle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($libelle);
            $entityManager->flush();

            return $this->redirectToRoute('app_libelle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('libelle/new.html.twig', [
            'libelle' => $libelle,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_libelle_show', methods: ['GET'])]
    public function show(Libelle $libelle): Response
    {
        return $this->render('libelle/show.html.twig', [
            'libelle' => $libelle,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_libelle_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Libelle $libelle, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LibelleType::class, $libelle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_libelle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('libelle/edit.html.twig', [
            'libelle' => $libelle,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_libelle_delete', methods: ['POST'])]
    public function delete(Request $request, Libelle $libelle, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$libelle->getId(), $request->request->get('_token'))) {
            $entityManager->remove($libelle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_libelle_index', [], Response::HTTP_SEE_OTHER);
    }
}
