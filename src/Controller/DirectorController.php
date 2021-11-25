<?php

namespace App\Controller;

use App\Entity\Director;
use App\Form\DirectorType;
use App\Repository\DirectorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DirectorController extends AbstractController
{
    /**
     * @Route("/director", name="director")
     */
    public function index(DirectorRepository $repository): Response
    {
        // $repository = $this->getDoctrine()->getRepository(Director::class);
        $directors = $repository->findAll();
        return $this->render('director/index.html.twig', [
            'directors' => $directors
        ]);
    }

    /**
     * @Route("/affichedirector/{id}", name="affichedirector")
     */

    // public function afficherUnDirecteur(DirectorRepository $repository, $id): Response 
    public function afficherUnDirecteur(Director $director): Response 
    {
        //
        // $director = $repository->find($id);
        return $this->render('director/afficherUn.html.twig',["director"=>$director]);
    }

    /**
     * @Route("/modifdirector/{id}", name="modifdirector")
     * @Route("/creationdirector", name="creationdirector")
     */

    public function modifierDirector(Director $director=null, Request $request, EntityManagerInterface $em) {

        if (!$director) {
            $director = new Director();
        }

        $form = $this->createForm(DirectorType::class,$director);

        $form->handleRequest($request);
        if ($form->isSubmitted() ) {
            $em->persist($director);
            $em->flush();
            return $this->redirectToRoute('director');
        }

        return $this->render('director/modifDirector.html.twig',[
            "director"=>$director,
            "form"=>$form->createView()
        ]);
    }
}
