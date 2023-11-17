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
        $jeux = $repo->findAll();
        return $this->render('jeu/listeJeu.html.twig', [
            'controller_name' => 'JeuController',
            'jeux' => $jeux,
        ]);
    }

    #[Route('/jeu/{genre}', name: 'app_jeu_filtre')]
    public function listeJeuFiltre(JeuRepository $repo, string $genre): Response
    {
        $jeux = $repo->findByGenre($genre);
        return $this->render('jeu/listeJeu.html.twig', [
            'controller_name' => 'JeuController',
            'jeux' => $jeux,
        ]);
    }

    #[Route('/ficheJeu/{id}', name: 'app_ficheJeu')]
    public function ficheJeu(Jeu $jeu): Response
    {
        return $this->render('jeu/ficheJeu.html.twig', [
            'controller_name' => 'JeuController',
            'jeu' => $jeu,
        ]);
    }
}
