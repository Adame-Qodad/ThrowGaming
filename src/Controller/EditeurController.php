<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditeurController extends AbstractController
{
    #[Route('/editeur', name: 'app_editeur')]
    public function listeEditeur(): Response
    {
        return $this->render('editeur/listeEditeur.html.twig', [
            'controller_name' => 'EditeurController',
        ]);
    }
}
