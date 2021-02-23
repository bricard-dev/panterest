<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public const USER_REFERENCE = 'user';

    public function load(ObjectManager $manager)
    {
        $user1 = (new User)
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setEmail('johndoe@example.com')
            ->setPassword('$argon2id$v=19$m=65536,t=4,p=1$Qec/vaL5oBmR1zxtSYXz8w$V2XnNtjgl9zm8lO8khXUZm3wk1fopbO9uek+QLqhYlY');
        ;
        $manager->persist($user1);

        $user2 = (new User)
            ->setFirstName('Jane')
            ->setLastName('Doe')
            ->setEmail('janedoe@example.com')
            ->setPassword('$argon2id$v=19$m=65536,t=4,p=1$aYBhJ7oaAh58p1Fu1JYOOA$GxQs6VAYxmIqPT4xe2/f1+A+EZ62kG8S5bBB/Tj8FTo');
        ;
        $manager->persist($user2);

        $manager->flush();

        $this->addReference(self::USER_REFERENCE, $user1);
    }
}
