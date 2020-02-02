<?php

namespace App\DataFixtures;

use App\Entity\Home;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class HomeFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $home = new Home();
        $home->setCkeditor("Test text");
        $manager->persist($home);

        $manager->flush();
    }
}
