<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Directors;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Film;

class FilmFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $d1 = new Directors();
        $d1->setNom("Allen")->setPrenom("Woodie")->setPhoto("allen.jpg");

        $manager->persist($d1);

        $d2 = new Directors();
        $d2->setNom("Dupontel")->setPrenom("Albert")->setPhoto("dupontel.jpg");

        $manager->persist($d2);

        $f1 = new Film();
        $f1->setTitre("Les visiteurs")->setDescription("Le comte Godefroy de Montmirail et son serviteur Jacquouille vivent au Moyen Âge. Par magie, ils sont transportés dans le temps")
        ->addDirector($d1);
        
        $manager->persist($f1);

        $f2 = new Film();
        $f2->setTitre("Snatch")->setDescription("Franky vient de voler un énorme diamant qu'il doit livrer à Avi, un mafieux new-yorkais. ")
        ->addDirector($d2);

        $manager->persist($f2);

        $f3 = new Film();
        $f3->setTitre("Le profesionnel")->setDescription("Issu de l'élite de l'armée française, Joss Beaumont est chargé d'exécuter le président de la Malagawi")
        ->addDirector($d1);

        $manager->persist($f3);

        $actor1 = new Actor();
        $actor1->setPrenom("Jean-Paul")
                   ->setNom("Belmondo")
                   ->setPhoto("belmondo.jpg")
                   ->addFilm($f3);
                   
           $manager->persist($actor1);

        $actor2 = new Actor();
        $actor2->setPrenom("Christian")
                  ->setNom("Clavier")
                  ->setPhoto("clavier.jpg")
                  ->addFilm($f1);
                      
            $manager->persist($actor2);

        $actor3 = new Actor();
        $actor3->setPrenom("Jean")
                  ->setNom("Reno")
                  ->setPhoto("reno.jpg")
                  ->addFilm($f1);
                          
            $manager->persist($actor3);

        $actor4 = new Actor();
        $actor4->setPrenom("Brad")
                ->setNom("Pitt")
                ->setPhoto("pitt.jpg")
                ->addFilm($f2);
                          
            $manager->persist($actor4);
        


        $manager->flush();
    }

     
}
