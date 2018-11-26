<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $cles = new Category();
        $cles->setLabel("Clés");
        $cles->setIcon("fa-key");
        $cles->setColor("#2480e4");
        $manager->persist($cles);
        $this->addReference('category-1', $cles);

        $jouet = new Category();
        $jouet->setLabel("Jouet");
        $jouet->setIcon("fa-child");
        $jouet->setColor("#e4d524");
        $manager->persist($jouet);
        $this->addReference('category-2', $jouet);


        $portefeuille = new Category();
        $portefeuille->setLabel("Portefeuille");
        $portefeuille->setIcon("fa-wallet");
        $portefeuille->setColor("#ce1d24");
        $manager->persist($portefeuille);
        $this->addReference('category-3', $portefeuille);


        $animaux = new Category();
        $animaux->setLabel("Animaux");
        $animaux->setIcon("fa-paw");
        $animaux->setColor("#4cac5b");
        $manager->persist($animaux);
        $this->addReference('category-4', $animaux);



        $manager->flush();
    }
}
