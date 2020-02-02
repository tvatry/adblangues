<?php

namespace App\DataFixtures;

use App\Entity\Locations;
use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LocationsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $locations = new Locations();
      $locations->setName('Compiègne');
      $manager->persist($locations);

      $locations = new Locations();
      $locations->setName('Soissons');
      $manager->persist($locations);

      $locations = new Locations();
      $locations->setName('Beauvais');
      $manager->persist($locations);

      $locations = new Locations();
      $locations->setName('Senlis');

      $contact = new Contact();
      $contact->setName('Doe');
      $contact->setMail('johndoe@mail.com');
      $contact->setFirstName('John');
      $contact->setLocation($locations);
      $manager->persist($locations);
      $manager->persist($contact);
      $manager->flush();

    }
}
