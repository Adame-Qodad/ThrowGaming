<?php

namespace App\Controller;

use App\Entity\Jeu;
use App\Entity\Genre;
use App\Repository\JeuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JeuController extends AbstractController
{
    #[Route('/jeu', name: 'app_jeu')]
    public function listeJeu(JeuRepository $repo): Response
    {
        
        return $this->render('jeu/listeJeu.html.twig', [
            'controller_name' => 'JeuController',
        ]);
    }

    #[Route('/jeu/{genre}', name: 'app_jeu_filtre')]
    public function listeJeuFiltre(JeuRepository $repo, Genre $genre): Response
    {
        $jeux = $repo->findBy(array());
        return $this->render('jeu/listeJeu.html.twig', [
            'controller_name' => 'JeuController',
        ]);
    }
}
