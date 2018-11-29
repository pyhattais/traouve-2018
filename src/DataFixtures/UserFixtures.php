<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    private $passwordEncoder;


    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    public function load(ObjectManager $manager)
    {
        $marie = new User();
        $marie->setFirstname("Marie");
        $marie->setLastname("Martin");
        $marie->setEmail("m.martin@gmail.com");
        $marie->setPassword($this->passwordEncoder->encodePassword($marie, "mmartin"));
        $marie->setPhone("0634675245");
        $marie->setPicture("marie.jpg");
        $marie->setRoles(["ROLE_USER"]);
        $manager->persist($marie);
        $this->addReference('user-1', $marie);

        $jacques = new User();
        $jacques->setFirstname("Jacques");
        $jacques->setLastname("Dupont");
        $jacques->setEmail("j.dupont@gmail.com");
        $jacques->setPassword($this->passwordEncoder->encodePassword($jacques, "jdupont"));
        $jacques->setPhone("0634675275");
        $jacques->setPicture("jacques.jpg");
        $jacques->setRoles(["ROLE_USER"]);
        $manager->persist($jacques);
        $this->addReference('user-2', $jacques);

        $pyh = new User();
        $pyh->setFirstname("Pierre-Yves");
        $pyh->setLastname("Hattais");
        $pyh->setEmail("py.hattais@gmail.com");
        $pyh->setPassword($this->passwordEncoder->encodePassword($pyh, "pyhattais"));
        $pyh->setPhone("0634675293");
        $pyh->setPicture("py.jpg");
        $pyh->setRoles(["ROLE_ADMIN"]);
        $manager->persist($pyh);
        $this->addReference('user-3', $pyh);

        $manager->flush();
    }
}
