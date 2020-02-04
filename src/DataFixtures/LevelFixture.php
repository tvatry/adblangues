<?php

namespace App\DataFixtures;

use App\Entity\Level;
use App\Entity\Locations;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LevelFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $levels = new Level();
        $levels->setName('A1');
        $levels->setMinReponse('6');
        $levels->setNbQuestion('10');
        $manager->persist($levels);

        $levels = new Level();
        $levels->setName('A2');
        $levels->setMinReponse('8');
        $levels->setNbQuestion('12');
        $manager->persist($levels);

        $levels = new Level();
        $levels->setName('B1');
        $levels->setMinReponse('10');
        $levels->setNbQuestion('14');
        $manager->persist($levels);

        $levels = new Level();
        $levels->setName('B2');
        $levels->setMinReponse('12');
        $levels->setNbQuestion('18');
        $manager->persist($levels);

        $levels = new Level();
        $levels->setName('C1');
        $levels->setMinReponse('14');
        $levels->setNbQuestion('20');
        $manager->persist($levels);

        $manager->flush();
    }
}
