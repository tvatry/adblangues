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
        $levels->setMin('10');
        $manager->persist($levels);

        $levels = new Level();
        $levels->setName('A2');
        $levels->setMin('12');
        $manager->persist($levels);

        $levels = new Level();
        $levels->setName('B1');
        $levels->setMin('14');
        $manager->persist($levels);

        $levels = new Level();
        $levels->setName('B2');
        $levels->setMin('18');
        $manager->persist($levels);

        $levels = new Level();
        $levels->setName('C1');
        $levels->setMin('20');
        $manager->persist($levels);

        $manager->flush();
    }
}
