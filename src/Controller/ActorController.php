<?php

namespace App\Controller;

use App\Repository\ActorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActorController extends AbstractController
{
    /**
     * @Route("/actor", name="actor")
     */
    public function index(ActorRepository $repository): Response
    {
        // $repository = $this->getDoctrine()->getRepository(Actor::class);
        $actors = $repository->findAll();
        return $this->render('actor/index.html.twig', [
            'actors' => $actors
        ]);
    }
}