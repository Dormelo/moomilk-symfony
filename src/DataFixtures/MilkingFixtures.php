<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Milking;

class MilkingFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $milking1 = new Milking();
        $milking1->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setCow($this->getReference(CowFixtures::COW_REFERENCE1))
            ->setQuantity(8);
        $manager->persist($milking1);

        $milking2 = new Milking();
        $milking2->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setCow($this->getReference(CowFixtures::COW_REFERENCE2))
            ->setQuantity(2);
        $manager->persist($milking2);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CowFixtures::class,
        );
    }
}
