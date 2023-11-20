<?php

namespace App\Controller\Admin;

use App\Repository\JeuRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JeuController extends AbstractController
{
    #[Route('/admin/jeux', name: 'app_admin_jeux')]
    public function liste(JeuRepository $repo): Response
    {
        $jeux = $repo->findAll();
        return $this->render('admin/jeu/index.html.twig', [
            'controller_name' => 'JeuController',
            'jeux' => $jeux,
        ]);
    }
}
