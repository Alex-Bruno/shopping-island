<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user
            ->setName('admin')
            ->setEmail('admin@steller.com')
            ->setBirthDate(new  \DateTime('1996-09-10'))
            ->setIdentification('070.978.696-40');

        $user->setPassword($this->passwordHasher->hashPassword(
            $user,
            'aaaa@102030'
        ));

        $manager->persist($user);
        $manager->flush();
    }
}
