<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Cow;

class CowFixtures extends Fixture implements DependentFixtureInterface
{
    public const COW_REFERENCE1 = 'cow1';
    public const COW_REFERENCE2 = 'cow2';

    public function load(ObjectManager $manager)
    {
        $cow1 = new Cow();
        $cow1->setName(self::COW_REFERENCE1)
            ->setBornAt(new \DateTime())
            ->setMatricule('ABCDE12345')
            ->setUser($this->getReference(UserFixtures::ADMIN_USER_REFERENCE));

        $this->addReference(self::COW_REFERENCE1, $cow1);
        $manager->persist($cow1);

        $cow2 = new Cow();
        $cow2->setName(self::COW_REFERENCE2)
            ->setBornAt(new \DateTime())
            ->setMatricule('LMNOP67890')
            ->setUser($this->getReference(UserFixtures::ADMIN_USER_REFERENCE));

        $this->addReference(self::COW_REFERENCE2, $cow2);
        $manager->persist($cow2);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}
