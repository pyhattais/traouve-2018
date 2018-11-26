<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\State;
use App\Entity\Traobject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TraobjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $medor = new Traobject();
        $medor->setTitle("Medor");
        $medor->setPicture("https://www.placecage.com/g/100/100");
        $medor->setDescription("J'ai perdu mon chien Medor");
        $medor->setEventAt(new \DateTime());
        $medor->setCity("Vannes");
        $medor->setAddress("Rue du vieux port");
        $medor->setCreatedAt(new \DateTime());
        $medor->setCategory($this->getReference('category-4'));
        $medor->setState($this->getReference('state-2'));
        $medor->setUser($this->getReference('user-2'));
        $medor->setCounty($this->getReference('county-2'));
        $manager->persist($medor);
        $this->addReference('traobject-1', $medor);

        $doudou = new Traobject();
        $doudou->setTitle("Doudou");
        $doudou->setPicture("https://www.placecage.com/g/100/100");
        $doudou->setDescription("J'ai perdu mon super doudou");
        $doudou->setEventAt(new \DateTime());
        $doudou->setCity("Rennes");
        $doudou->setAddress("Place des lices");
        $doudou->setCreatedAt(new \DateTime());
        $doudou->setCategory($this->getReference('category-2'));
        $doudou->setState($this->getReference('state-2'));
        $doudou->setUser($this->getReference('user-1'));
        $doudou->setCounty($this->getReference('county-4'));
        $manager->persist($doudou);
        $this->addReference('traobject-2', $doudou);

        $cartebancaire = new Traobject();
        $cartebancaire->setTitle("Carte bancaire");
        $cartebancaire->setPicture("https://www.placecage.com/g/100/100");
        $cartebancaire->setDescription("J'ai trouvé une carte bancaire");
        $cartebancaire->setEventAt(new \DateTime());
        $cartebancaire->setCity("Brest");
        $cartebancaire->setAddress("Place du port");
        $cartebancaire->setCreatedAt(new \DateTime());
        $cartebancaire->setCategory($this->getReference('category-3'));
        $cartebancaire->setState($this->getReference('state-1'));
        $cartebancaire->setUser($this->getReference('user-3'));
        $cartebancaire->setCounty($this->getReference('county-1'));
        $manager->persist($cartebancaire);
        $this->addReference('traobject-3', $cartebancaire);

        $badge = new Traobject();
        $badge->setTitle("Badge");
        $badge->setPicture("https://www.placecage.com/g/100/100");
        $badge->setDescription("J'ai trouvé un badge et des clés");
        $badge->setEventAt(new \DateTime());
        $badge->setCity("Rennes");
        $badge->setAddress("Avenue du Mail Mitterand");
        $badge->setCreatedAt(new \DateTime());
        $badge->setCategory($this->getReference('category-1'));
        $badge->setState($this->getReference('state-1'));
        $badge->setUser($this->getReference('user-1'));
        $badge->setCounty($this->getReference('county-4'));
        $manager->persist($badge);
        $this->addReference('traobject-4', $badge);

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return[CategoryFixtures::class, StateFixtures::class, CountyFixtures::class, UserFixtures::class];
    }
}
