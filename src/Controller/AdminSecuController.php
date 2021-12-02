<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminSecuController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $encoder)
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(InscriptionType::class, $utilisateur);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $passwordCrypte = $encoder->hashPassword($utilisateur,$utilisateur->getPassword());
            $utilisateur->setPassword($passwordCrypte);
            $utilisateur->setRoles("ROLE_USER");
            
            $em->persist($utilisateur);
            $em->flush();
            return $this->redirectToRoute("accueil");
            }
            return $this->render('admin_secu/inscription.html.twig',[
            "form" => $form->createView()
            ]);
             
        
    }

    /**
     * @Route("/login", name="connexion")
     */
    public function login(AuthenticationUtils $util) 
    {
        return $this->render("user/user.html.twig",[
            "lastUserName" => $util->getLastUsername(),
            "error" => $util->getLastAuthenticationError()
        ]);
    }

//----
// l'action du form rappelle celle la route /connexion et grâce au composant securité tout est automatique
// attention !!! dans le form bien déclarer _username _password.
// et dans security.yaml
// in_database
// ...etc...
// property: champ unique sur lequel on va faire le lien.
// login path et check path. (nom de la route)
//----


    /**
     * @Route("/logout", name="deconnexion")
     */
    public function logout() 
    {
        
    }

     /**
     * @Route("/accueil", name="accueil")
     */
    public function accueil()
    {
        return $this->render('/accueil.html.twig');
    }

}

