<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actor;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $a1 = new Actor();
        $a1->setNom("Pitt")->setPrenom("Brad")->setPhoto("pitt.jpg");

        $manager->persist($a1);

        $a2 = new Actor();
        $a2->setNom("Reno")->setPrenom("Jean")->setPhoto("reno.jpg");

        $manager->persist($a2);


        $a3 = new Actor();
        $a3->setNom("Clavier")->setPrenom("Christian")->setPhoto("clavier.jpg");

        $manager->persist($a3);

        $a4 = new Actor();
        $a4->setNom("Belmondo")->setPrenom("Jean-Paul")->setPhoto("belmondo.jpg")->setPhoto("belmondo.jpg");

        $manager->persist($a4);
        

        $manager->flush();
    }

     
}
