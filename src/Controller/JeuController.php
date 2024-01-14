<?php

namespace App\Controller;

use App\Entity\Jeu;
use App\Repository\JeuRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JeuController extends AbstractController
{
    #[Route('/jeux', name: 'app_jeu')]
   public function listeJeu(JeuRepository $repo, PaginatorInterface $p, Request $r): Response
    {
        $jeux = $p->paginate(
            $repo->listePagine(),
            $r->query->getInt('page', 1),
            6
        );
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
