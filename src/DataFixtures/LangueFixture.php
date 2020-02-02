<?php

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LangueFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $langue = new Language();
        $langue->setName("Anglais");
        $manager->persist($langue);

        $langue1 = new Language();
        $langue1->setName("Allemand");
        $manager->persist($langue1);

        $manager->flush();
    }
}
