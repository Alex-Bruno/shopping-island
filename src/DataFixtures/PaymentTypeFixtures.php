<?php

namespace App\DataFixtures;

use App\Entity\PaymentType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PaymentTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $entity = new PaymentType();

        $entity
            ->setName('Dinheiro')
            ->setDiscount(10);

        $manager->persist($entity);

        $manager->flush();
    }
}
