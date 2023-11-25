<?php

namespace App\Controller;

use App\Entity\Operation;
use App\Form\OperationType;
use App\Repository\OperationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/operation')]
class OperationController extends AbstractController
{
    #[Route('/{id}', name: 'app_operation_index', methods: ['GET'])]
    public function index(OperationRepository $operationRepository, int $id): Response
    {
        return $this->render('operation/index.html.twig', [
            'operations' => $operationRepository->findBy(['compte' => $id]),
        ]);
    }
}
