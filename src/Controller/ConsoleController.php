<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConsoleController extends AbstractController
{
    #[Route('/console', name: 'app_console')]
    public function listeConsole(): Response
    {
        return $this->render('console/listeConsole.html.twig', [
            'controller_name' => 'ConsoleController',
        ]);
    }

    #[Route('/console', name: 'app_ficheConsole')]
    public function ficheConsole(): Response
    {
        return $this->render('console/ficheConsole.html.twig', [
            'controller_name' => 'ConsoleController',
        ]);
    }
}
