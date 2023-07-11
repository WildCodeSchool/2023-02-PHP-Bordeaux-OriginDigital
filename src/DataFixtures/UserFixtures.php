<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Video;
use DateTimeImmutable;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;


    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $admin = new User();
        $admin->setEmail('Admin@wildsports.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->passwordHasher->hashPassword(
                $admin,
                'password'
            ))
            ->setFirstname('Admin')
            ->setLastname('Admin')
            ->setDateOfBirth(DateTimeImmutable::createFromMutable($faker
                ->dateTimeBetween('-50 years', '-18 years')));
        $manager->persist($admin);

        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setPassword($this->passwordHasher->hashPassword(
                $user,
                'password'
            ));
            $user->setRoles(['ROLE_USER']);
            $user->setFirstName($faker->firstName);
            $user->setLastName($faker->lastName);
            $user->setDateOfBirth(DateTimeImmutable::createFromMutable($faker
                ->dateTimeBetween('-50 years', '-18 years')));
            $manager->persist($user);
        }

        $manager->flush();
    }
}
