<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Pin;

class PinFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 4; $i++) {
            $pin = (new Pin)
                ->setTitle("Pin {$i}")
                ->setDescription("Description {$i}");
            $manager->persist($pin);
        }

        $manager->flush();
    }
}
