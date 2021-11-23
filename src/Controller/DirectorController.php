<?php

namespace App\Controller;

use App\Repository\DirectorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
