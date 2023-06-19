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
        $videoList = ['Basketball1.mp4', 'Basketball2.mp4', 'Basketball3.mp4',
            'Basketball4.mp4', 'Basketball5.mp4', 'Basketball6.mp4', 'Basketball7.mp4',
            'Basketball8.mp4', 'Basketball9.mp4', 'Basketball10.mp4', 'Basketball11.mp4',
            'Basketball12.mp4',
            'Football1.mp4', 'Football2.mp4', 'Football3.mp4', 'Football4.mp4',
            'Football5.mp4', 'Football6.mp4', 'Football7.mp4', 'Football8.mp4',
            'Football9.mp4', 'Football10.mp4', 'Football11.mp4', 'Football12.mp4',
            'Surf1.mp4', 'Surf2.mp4','Surf3.mp4','Surf4.mp4','Surf5.mp4','Surf6.mp4',
            'Surf7.mp4', 'Surf8.mp4', 'Surf9.mp4', 'Surf10.mp4','Surf11.mp4','Surf12.mp4',
            'Tennis1.mp4', 'Tennis2.mp4','Tennis3.mp4','Tennis4.mp4','Tennis5.mp4',
            'Tennis6.mp4','Tennis7.mp4','Tennis8.mp4','Tennis9.mp4','Tennis10.mp4',
            'Tennis11.mp4','Tennis12.mp4',
            'Volleyball1.mp4', 'Volleyball1.mp2', 'Volleyball1.mp3', 'Volleyball4.mp4',
            'Volleyball5.mp4', 'Volleyball6.mp4', 'Volleyball7.mp4', 'Volleyball8.mp4',
            'Volleyball9.mp4', 'Volleyball10.mp4', 'Volleyball11.mp4', 'Volleyball12.mp4'];

        $videoCategory = ['Basketball', 'Football', 'Surf', 'Tennis', 'Volleyball'];

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

        for ($i = 0; $i < count($videoList); $i++) {
            $video = new Video();
            $video->setTitle($faker->text);
            $video->setDescription($faker->paragraph);
            $video->setIsPremium(rand(0, 1));
            $video->setVideoLink($videoList[$i]);
            $manager->persist($video);
        }
        for ($i = 0; $i < count($videoList); $i++) {
            $category = new Category();
            $category
                ->setName($videoCategory[$i])
                ->addVideo($video);
            $manager->persist($category);
        }


        $manager->flush();
    }
}
