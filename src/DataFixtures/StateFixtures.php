<?php

namespace App\DataFixtures;

use App\Entity\State;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StateFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $trouve = new State();
        $trouve->setLabel("Trouvé");
        $trouve->setColor("#16cc6d");
        $manager->persist($trouve);
        $this->addReference('state-1', $trouve);

        $perdu = new State();
        $perdu->setLabel("Perdu");
        $perdu->setColor("#2395c2");
        $manager->persist($perdu);
        $this->addReference('state-2', $perdu);

        $manager->flush();
    }
}
