<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $commentmedor1 = new Comment();
        $commentmedor1->setContent("J'ai aperçu votre chien dans la rue");
        $commentmedor1->setUser($this->getReference('user-1'));
        $commentmedor1->setTraobject($this->getReference('traobject-1'));
        $manager->persist($commentmedor1);

        $commentmedor2 = new Comment();
        $commentmedor2->setContent("J'ai cru voir votre chien dans un parc près de chez moi");
        $commentmedor2->setUser($this->getReference('user-3'));
        $commentmedor2->setTraobject($this->getReference('traobject-1'));
        $manager->persist($commentmedor2);

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
        return[TraobjectFixtures::class, UserFixtures::class];
    }
}
