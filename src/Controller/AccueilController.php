<?php

namespace App\Controller;

// entitées
use App\Entity\Genre;
use App\Repository\GenreRepository;
use App\Entity\Jeu;
use App\Repository\JeuRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(GenreRepository $gRep, JeuRepository $jRep): Response
    {
        $genres = $gRep->findAll();
        $cptJeux  = count($jRep->findAll());
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'genres' => $genres,
            'cptJeux' => $cptJeux,
        ]);
    }
}
