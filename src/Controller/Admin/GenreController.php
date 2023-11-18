<?php

namespace App\Controller\Admin;

use App\Entity\Genre;
use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GenreController extends AbstractController
{
    #[Route('/admin/genres', name: 'app_admin_genre')]
    public function liste(GenreRepository $repo): Response
    {
        $genres = $repo->findAll();
        return $this->render('admin/genre/listeGenre.html.twig', [
            'controller_name' => 'GenreController',
            'genres' => $genres,
        ]);
    }
}
