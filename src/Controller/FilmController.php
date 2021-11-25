<?php

namespace App\Controller;

use App\Entity\Film;
use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{
    /**
     * @Route("/film", name="film")
     */
    public function index(FilmRepository $repository): Response
    {
        $films = $repository->findAll();
        return $this->render('film/index.html.twig', [
            'films' => $films
        ]);
    }

    /**
     * @Route("/affichefilm/{id}", name="affichefilm")
     */

    // public function afficherUnFilm(FilmRepository $ar, $id): Response 
    public function afficherUnFilm(Film $film): Response 
    {
        //
        // $film = $ar->find($id);
        return $this->render('film/afficherUn.html.twig',["film"=>$film]);
    }
}


 
   