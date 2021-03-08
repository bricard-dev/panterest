<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Pin;
use App\Entity\User;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PinFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 100; $i++) {
            $pin = (new Pin)
                ->setTitle("Pin {$i}")
                ->setDescription("Description {$i}")
                ->setUser($this->getReference(UserFixtures::USER_REFERENCE))
            ;   
            $manager->persist($pin);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
