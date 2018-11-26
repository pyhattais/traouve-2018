<?php

namespace App\DataFixtures;

use App\Entity\County;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CountyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $finistere = new County();
        $finistere->setLabel("Finistère");
        $finistere->setZipcode("29");
        $manager->persist($finistere);
        $this->addReference('county-1', $finistere);


        $morbihan = new County();
        $morbihan->setLabel("Morbihan");
        $morbihan->setZipcode("56");
        $manager->persist($morbihan);
        $this->addReference('county-2', $morbihan);


        $cotedarmor = new County();
        $cotedarmor->setLabel("Côtes-d'Armor");
        $cotedarmor->setZipcode("22");
        $manager->persist($cotedarmor);
        $this->addReference('county-3', $cotedarmor);


        $illetvilaine = new County();
        $illetvilaine->setLabel("Ille-et-Vilaine");
        $illetvilaine->setZipcode("35");
        $manager->persist($illetvilaine);
        $this->addReference('county-4', $illetvilaine);


        $manager->flush();
    }
}
