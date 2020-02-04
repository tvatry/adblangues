<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use FontLib\Table\Type\name;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
//use Symfony\Component\Security\Core\Role\Role;

class SuperAdminFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct( UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setUsername('demo');
        $user->setPassword($this->encoder->encodePassword($user, 'demo'));
        $user->setEmail('demo@demo.fr');
        $user->setToken(time());
        $user->setIsActive(1);
        $user->setRoles(array("ROLE_SUPER_ADMIN"));
        $manager->persist($user);

        $user = new User();
        $user->setUsername('c.symien');
        $user->setPassword($this->encoder->encodePassword($user, 'promeo'));
        $user->setEmail('c.symien@promeo-formation.fr');
        $user->setToken(time());
        $user->setIsActive(1);
        $user->setRoles(array("ROLE_FORMATEUR"));
        $manager->persist($user);

        $user = new User();
        $user->setUsername('a.cailly');
        $user->setPassword($this->encoder->encodePassword($user, 'promeo'));
        $user->setEmail('a.cailly@promeo-formation.fr');
        $user->setToken(time());
        $user->setIsActive(1);
        $user->setRoles(array("ROLE_FORMATEUR"));
        $manager->persist($user);

        $user = new User();
        $user->setUsername('z.blin');
        $user->setPassword($this->encoder->encodePassword($user, 'promeo'));
        $user->setEmail('z.blin@promeo-formation.fr');
        $user->setToken(time());
        $user->setIsActive(1);
        $user->setRoles(array("ROLE_FORMATEUR"));
        $manager->persist($user);

        $user = new User();
        $user->setUsername('mf.cassan');
        $user->setPassword($this->encoder->encodePassword($user, 'promeo'));
        $user->setEmail('mf.cassan@promeo-formation.fr');
        $user->setToken(time());
        $user->setIsActive(1);
        $user->setRoles(array("ROLE_FORMATEUR"));
        $manager->persist($user);

        $user = new User();
        $user->setUsername('i.maximy');
        $user->setPassword($this->encoder->encodePassword($user, 'promeo'));
        $user->setEmail('i.maximy@promeo-formation.fr');
        $user->setToken(time());
        $user->setIsActive(1);
        $user->setRoles(array("ROLE_FORMATEUR"));
        $manager->persist($user);

        $user = new User();
        $user->setUsername('f.poiret');
        $user->setPassword($this->encoder->encodePassword($user, 'promeo'));
        $user->setEmail('f.poiret@promeo-formation.fr');
        $user->setToken(time());
        $user->setIsActive(1);
        $user->setRoles(array("ROLE_FORMATEUR"));
        $manager->persist($user);

        $user = new User();
        $user->setUsername('l.heydtblanquart');
        $user->setPassword($this->encoder->encodePassword($user, 'promeo'));
        $user->setEmail('l.heydtblanquart@promeo-formation.fr');
        $user->setToken(time());
        $user->setIsActive(1);
        $user->setRoles(array("ROLE_FORMATEUR"));
        $manager->persist($user);

        $user = new User();
        $user->setUsername('l.cerisier');
        $user->setPassword($this->encoder->encodePassword($user, 'promeo'));
        $user->setEmail('l.cerisier@promeo-formation.fr');
        $user->setToken(time());
        $user->setIsActive(1);
        $user->setRoles(array("ROLE_FORMATEUR"));
        $manager->persist($user);

        $user = new User();
        $user->setUsername('a.guedes');
        $user->setPassword($this->encoder->encodePassword($user, 'promeo'));
        $user->setEmail('a.guedes@promeo-formation.fr');
        $user->setToken(time());
        $user->setIsActive(1);
        $user->setRoles(array("ROLE_FORMATEUR"));
        $manager->persist($user);

        $user = new User();
        $user->setUsername('s.pain');
        $user->setPassword($this->encoder->encodePassword($user, 'promeo'));
        $user->setEmail('s.pain@promeo-formation.fr');
        $user->setToken(time());
        $user->setIsActive(1);
        $user->setRoles(array("ROLE_FORMATEUR"));
        $manager->persist($user);

        $user = new User();
        $user->setUsername('c.dumalanede');
        $user->setPassword($this->encoder->encodePassword($user, 'promeo'));
        $user->setEmail('c.dumalanede@promeo-formation.fr');
        $user->setToken(time());
        $user->setIsActive(1);
        $user->setRoles(array("ROLE_FORMATEUR"));
        $manager->persist($user);

        $user = new User();
        $user->setUsername('l.quemart');
        $user->setPassword($this->encoder->encodePassword($user, 'promeo'));
        $user->setEmail('l.quemart@promeo-formation.fr');
        $user->setToken(time());
        $user->setIsActive(1);
        $user->setRoles(array("ROLE_FORMATEUR"));
        $manager->persist($user);

        $manager->flush();
    }
}
