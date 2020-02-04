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
        $contact = new Contact();
        $contact->setName('CASSAN');
        $contact->setMail('mf.cassan@promeo-formation.fr');
        $contact->setFirstName('Marie-Françoise');
        $contact->setLocation($locations);
        $manager->persist($contact);
        $contact = new Contact();
        $contact->setName('MAXIMY');
        $contact->setMail('i.maximy@promeo-formation.fr');
        $contact->setFirstName('Isabelle');
        $contact->setLocation($locations);
        $manager->persist($contact);
      $manager->persist($locations);

      $locations = new Locations();
      $locations->setName('Soissons');
        $contact = new Contact();
        $contact->setName('QUEMART');
        $contact->setMail('l.quemart@promeo-formation.fr');
        $contact->setFirstName('Laetitia');
        $contact->setLocation($locations);
        $manager->persist($contact);
      $manager->persist($locations);

      $locations = new Locations();
      $locations->setName('Beauvais');
        $contact = new Contact();
        $contact->setName('BLIN');
        $contact->setMail('z.blin@promeo-formation.fr');
        $contact->setFirstName('Zorah');
        $contact->setLocation($locations);
        $manager->persist($contact);
      $manager->persist($locations);

        $locations = new Locations();
        $locations->setName('Amiens');
        $contact = new Contact();
        $contact->setName('SYMIEN');
        $contact->setMail('c.symien@promeo-formation.fr');
        $contact->setFirstName('Catherine');
        $contact->setLocation($locations);
        $manager->persist($contact);
        $contact = new Contact();
        $contact->setName('CAILLY');
        $contact->setMail('a.cailly@promeo-formation.fr');
        $contact->setFirstName('Alexandra');
        $contact->setLocation($locations);
        $manager->persist($contact);
        $manager->persist($locations);

        $locations = new Locations();
        $locations->setName('Friville');
        $contact = new Contact();
        $contact->setName('POIRET');
        $contact->setMail('f.poiret@promeo-formation.fr');
        $contact->setFirstName('Fanny');
        $contact->setLocation($locations);
        $manager->persist($contact);
        $manager->persist($locations);

        $locations = new Locations();
        $locations->setName('Saint-Quentin');
        $contact = new Contact();
        $contact->setName('HEYDT-BLANQUART');
        $contact->setMail('l.heydtblanquart@promeo-formation.fr');
        $contact->setFirstName('Laurence');
        $contact->setLocation($locations);
        $manager->persist($contact);

        $contact = new Contact();
        $contact->setName('CERISIER');
        $contact->setMail('l.cerisier@promeo-formation.fr');
        $contact->setFirstName('L');
        $contact->setLocation($locations);
        $manager->persist($contact);

        $contact = new Contact();
        $contact->setName('GUEDES');
        $contact->setMail('a.guedes@promeo-formation.fr');
        $contact->setFirstName('A');
        $contact->setLocation($locations);
        $manager->persist($contact);
        $manager->persist($locations);

      $locations = new Locations();
      $locations->setName('Senlis');

      $contact = new Contact();
      $contact->setName('PAIN');
      $contact->setMail('s.pain@promeo-formation.fr');
      $contact->setFirstName('Susan');
      $contact->setLocation($locations);
      $manager->persist($contact);

      $contact = new Contact();
      $contact->setName('DUMALANEDE');
      $contact->setMail('c.dumalanede@promeo-formation.fr');
      $contact->setFirstName('Cécile');
      $contact->setLocation($locations);
      $manager->persist($contact);

        $contact = new Contact();
        $contact->setName('QUEMART');
        $contact->setMail('l.quemart@promeo-formation.fr');
        $contact->setFirstName('Laetitia');
        $contact->setLocation($locations);
        $manager->persist($contact);

      $manager->persist($locations);

      $manager->flush();

    }
}
