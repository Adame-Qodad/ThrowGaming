<?php

namespace App\Controller;

use App\Entity\Editeur;
use App\Repository\EditeurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EditeurController extends AbstractController
{

    #[Route('/editeur', name: 'app_editeur')]
    public function listeEditeur(EditeurRepository $repo): Response
    {
        $editeurs=$repo->findAll();
        $editeurs=array_splice($editeurs, 1);
        return $this->render('editeur/listeEditeur.html.twig',[
            'controller_name' => 'EditeurController',
            'lesEditeurs' => $editeurs

        ]);
        
    }

    #[Route('/editeur/{id}', name: 'fiche_editeur')]
    public function ficheEditeur(Editeur $editeur): Response
    {
        return $this->render('editeur/ficheEditeur.html.twig',[
            'controller_name' => 'EditeurController',
            'leEditeur' => $editeur

        ]);     
    }

}