<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    // /**
    //  * @Route("/user", name="user")
    //  */
    // public function index(): Response
    // {
    //     return $this->render('user/index.html.twig', [
    //         'controller_name' => 'UserController',
    //     ]);
    // }

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

}
