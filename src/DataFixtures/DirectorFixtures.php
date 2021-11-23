<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Director;

class DirectorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $a1 = new Director();
        $a1->setNom("Dupontel")->setPrenom("Albert")->setPhoto("dupontel.jpg");

        $manager->persist($a1);

        $a2 = new Director();
        $a2->setNom("Allen")->setPrenom("Woodie")->setPhoto("allen.jpg");

        $manager->persist($a2);


        $manager->flush();
    }

     
}
