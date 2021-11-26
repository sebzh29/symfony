<?php

namespace App\Controller;

use App\Entity\Directors;
use App\Repository\DirectorsRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DirectorController extends AbstractController
{
    /**
     * @Route("/director", name="director")
     */
    public function index(DirectorsRepository $dr): Response
    {
        // $repository = $this->getDoctrine()->getRepository(Directors::class);
        $directors = $dr->findAll();
        return $this->render('director/index.html.twig', [
            'directors' => $directors
        ]);
    }

      /**
     * @Route("/affichedirector/{id}", name="affichedirector")
     */

    // public function afficherUnDirecteur(DirectorRepository $dr, $id): Response 
    public function afficherUnDirecteur(Directors $director): Response 
    {
        //
        // $actor = $dr->find($id);
        return $this->render('director/afficherUn.html.twig',["director"=>$director]);
    }

    /**
     * @Route("/modifdirector/{id}", name="modifdirector")
     * @Route("/creationdirector", name="creationdirector")
     */

    public function modifierDirector(Directors $director=null, Request $request, EntityManagerInterface $em) {

        if (!$director) {
            $director = new Directors();
        }

        $form = $this->createForm(DirectorType::class,$director);

        $form->handleRequest($request);
        if ($form->isSubmitted() ) {
            $em->persist($director);
            $em->flush();
            return $this->redirectToRoute('director');
        }

        return $this->render('actor/modifDirector.html.twig',[
            "director"=>$director,
            "form"=>$form->createView()
        ]);
    }
}
