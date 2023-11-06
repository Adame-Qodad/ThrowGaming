<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JeuController extends AbstractController
{
    #[Route('/jeu', name: 'app_jeu')]
    public function listeJeu(): Response
    {
        return $this->render('jeu/listeJeu.html.twig', [
            'controller_name' => 'JeuController',
        ]);
    }
    #[Route('/ficheJeu', name: 'app_ficheJeu')]
    public function ficheJeu(): Response
    {
        return $this->render('jeu/ficheJeu.html.twig', [
            'controller_name' => 'JeuController',
        ]);
    }
}
