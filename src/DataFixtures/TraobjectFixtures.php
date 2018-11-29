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
        $medor->setTitle("Medor le labrador");
        $medor->setPicture("labrador.jpg");
        $medor->setDescription("J'ai perdu mon chien Medor, un labrador beige");
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
        $doudou->setTitle("Michou le Doudou");
        $doudou->setPicture("doudou.jpg");
        $doudou->setDescription("J'ai perdu mon super doudou Michou, il est bleu et tout doux");
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

        $clesappt = new Traobject();
        $clesappt->setTitle("Clés d'appartement");
        $clesappt->setPicture("cles.jpg");
        $clesappt->setDescription("J'ai perdu mes clés, avec plusieurs badges et un porte clés bleu");
        $clesappt->setEventAt(new \DateTime());
        $clesappt->setCity("Lannion");
        $clesappt->setAddress("Rue du vieux bourg");
        $clesappt->setCreatedAt(new \DateTime());
        $clesappt->setCategory($this->getReference('category-1'));
        $clesappt->setState($this->getReference('state-2'));
        $clesappt->setUser($this->getReference('user-3'));
        $clesappt->setCounty($this->getReference('county-3'));
        $manager->persist($clesappt);
        $this->addReference('traobject-3', $clesappt);

        $cartebancaire = new Traobject();
        $cartebancaire->setTitle("Carte bancaire Mastercard");
        $cartebancaire->setPicture("cartebancaire.jpg");
        $cartebancaire->setDescription("J'ai trouvé une carte bancaire, de la marque Mastercard, banque Crédit Agricole");
        $cartebancaire->setEventAt(new \DateTime());
        $cartebancaire->setCity("Brest");
        $cartebancaire->setAddress("Place du port");
        $cartebancaire->setCreatedAt(new \DateTime());
        $cartebancaire->setCategory($this->getReference('category-3'));
        $cartebancaire->setState($this->getReference('state-1'));
        $cartebancaire->setUser($this->getReference('user-3'));
        $cartebancaire->setCounty($this->getReference('county-1'));
        $manager->persist($cartebancaire);
        $this->addReference('traobject-4', $cartebancaire);

        $badge = new Traobject();
        $badge->setTitle("Badges et clés");
        $badge->setDescription("J'ai trouvé un trousseau avec des badges et des clés, avec un poste clé rouge");
        $badge->setEventAt(new \DateTime());
        $badge->setCity("Rennes");
        $badge->setAddress("Avenue du Mail Mitterand");
        $badge->setCreatedAt(new \DateTime());
        $badge->setCategory($this->getReference('category-1'));
        $badge->setState($this->getReference('state-1'));
        $badge->setUser($this->getReference('user-1'));
        $badge->setCounty($this->getReference('county-4'));
        $manager->persist($badge);
        $this->addReference('traobject-5', $badge);

        $gaston = new Traobject();
        $gaston->setTitle("Gaston le chat");
        $gaston->setPicture("chatroux.jpg");
        $gaston->setDescription("J'ai trouvé un chat roux, du nom de Gaston");
        $gaston->setEventAt(new \DateTime());
        $gaston->setCity("Rennes");
        $gaston->setAddress("Parc du Thabor");
        $gaston->setCreatedAt(new \DateTime());
        $gaston->setCategory($this->getReference('category-4'));
        $gaston->setState($this->getReference('state-1'));
        $gaston->setUser($this->getReference('user-2'));
        $gaston->setCounty($this->getReference('county-4'));
        $manager->persist($gaston);
        $this->addReference('traobject-6', $gaston);

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
