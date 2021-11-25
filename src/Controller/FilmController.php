<?php

namespace App\Controller;

use App\Entity\Film;
use App\Form\FilmType;
use App\Repository\FilmRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

     /**
     * @Route("/modiffilm/{id}", name="modiffilm")
     * @Route("/creationfilm", name="creationfilm")
     */

    public function modifierFilm(Film $film=null, Request $request, EntityManagerInterface $em) {

        if (!$film) {
            $film = new Film();
        }

        $form = $this->createForm(FilmType::class,$film);

        $form->handleRequest($request);
        if ($form->isSubmitted() ) {
            $em->persist($film);
            $em->flush();
            return $this->redirectToRoute('film');
        }

        return $this->render('film/modifFilm.html.twig',[
            "film"=>$film,
            "form"=>$form->createView()
        ]);
    }
}


 
   