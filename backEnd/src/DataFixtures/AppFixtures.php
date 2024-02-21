<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Galaxy;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Créez 15 planètes avec la relation utilisateur définie comme nulle
        for ($i = 1; $i <= 15; $i++) {
            $galaxy = new Galaxy();
            $galaxy->setName(null);
            $galaxy->setUser(null);

            $manager->persist($galaxy);
        }

        $manager->flush();
    }
}
