<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public const ADMIN_USER_REFERENCE = 'admin-user';

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setEmail('adminuser@gmail.com');
        $userAdmin->setPassword($this->passwordEncoder->encodePassword(
            $userAdmin,
            'the_new_password'
        ));
        $this->addReference(self::ADMIN_USER_REFERENCE, $userAdmin);

        $manager->persist($userAdmin);
        $manager->flush();


    }


}
