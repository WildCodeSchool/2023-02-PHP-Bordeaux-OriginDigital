<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;

class VideoFixtures extends Fixture implements DependentFixtureInterface
{
    public const VIDEOS = [
        [
            'videoTitle' => 'Basketball1',
            'videoPicture' => 'basketball1.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoTitle' => 'Basketball2',
            'videoPicture' => 'basketball2.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoTitle' => 'Basketball3',
            'videoPicture' => 'basketball3.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoTitle' => 'Basketball4',
            'videoPicture' => 'basketball1.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoTitle' => 'Basketball5',
            'videoPicture' => 'basketball2.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoTitle' => 'Basketball6',
            'videoPicture' => 'basketball3.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoTitle' => 'Basketball7',
            'videoPicture' => 'basketball1.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoTitle' => 'Basketball8',
            'videoPicture' => 'basketball2.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoTitle' => 'Basketball9',
            'videoPicture' => 'basketball3.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoTitle' => 'Basketball10',
            'videoPicture' => 'basketball1.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoTitle' => 'Basketball11',
            'videoPicture' => 'basketball2.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoTitle' => 'Basketball12',
            'videoPicture' => 'basketball3.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoTitle' => 'Football1',
            'videoPicture' => 'football1.jpg',
            'category' => 'Football'
        ],
        [
            'videoTitle' => 'Football2',
            'videoPicture' => 'football2.jpg',
            'category' => 'Football'
        ],
        [
            'videoTitle' => 'Football3',
            'videoPicture' => 'football3.jpg',
            'category' => 'Football'
        ],
        [
            'videoTitle' => 'Football4',
            'videoPicture' => 'football1.jpg',
            'category' => 'Football'
        ],
        [
            'videoTitle' => 'Football5',
            'videoPicture' => 'football2.jpg',
            'category' => 'Football'
        ],
        [
            'videoTitle' => 'Football6',
            'videoPicture' => 'football3.jpg',
            'category' => 'Football'
        ],
        [
            'videoTitle' => 'Football7',
            'videoPicture' => 'football1.jpg',
            'category' => 'Football'
        ],
        [
            'videoTitle' => 'Football8',
            'videoPicture' => 'football2.jpg',
            'category' => 'Football'
        ],
        [
            'videoTitle' => 'Football9',
            'videoPicture' => 'football3.jpg',
            'category' => 'Football'
        ],
        [
            'videoTitle' => 'Football10',
            'videoPicture' => 'football1.jpg',
            'category' => 'Football'
        ],
        [
            'videoTitle' => 'Football11',
            'videoPicture' => 'football2.jpg',
            'category' => 'Football'
        ],
        [
            'videoTitle' => 'Football12',
            'videoPicture' => 'football3.jpg',
            'category' => 'Football'
        ],
        [
            'videoTitle' => 'Surf1',
            'videoPicture' => 'surf1.jpg',
            'category' => 'Surf'
        ],
        [
            'videoTitle' => 'Surf2',
            'videoPicture' => 'surf2.jpg',
            'category' => 'Surf'
        ],
        [
            'videoTitle' => 'Surf3',
            'videoPicture' => 'surf3.jpg',
            'category' => 'Surf'
        ],
        [
            'videoTitle' => 'Surf4',
            'videoPicture' => 'surf1.jpg',
            'category' => 'Surf'
        ],
        [
            'videoTitle' => 'Surf5',
            'videoPicture' => 'surf2.jpg',
            'category' => 'Surf'
        ],
        [
            'videoTitle' => 'Surf6',
            'videoPicture' => 'surf3.jpg',
            'category' => 'Surf'
        ],
        [
            'videoTitle' => 'Surf7',
            'videoPicture' => 'surf1.jpg',
            'category' => 'Surf'
        ],
        [
            'videoTitle' => 'Surf8',
            'videoPicture' => 'surf2.jpg',
            'category' => 'Surf'
        ],
        [
            'videoTitle' => 'Surf9',
            'videoPicture' => 'surf3.jpg',
            'category' => 'Surf'
        ],
        [
            'videoTitle' => 'Surf10',
            'videoPicture' => 'surf1.jpg',
            'category' => 'Surf'
        ],
        [
            'videoTitle' => 'Surf11',
            'videoPicture' => 'surf2.jpg',
            'category' => 'Surf'
        ],
        [
            'videoTitle' => 'Surf12',
            'videoPicture' => 'surf3.jpg',
            'category' => 'Surf'
        ],
        [
            'videoTitle' => 'Tennis1',
            'videoPicture' => 'tennis1.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoTitle' => 'Tennis2',
            'videoPicture' => 'tennis2.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoTitle' => 'Tennis3',
            'videoPicture' => 'tennis3.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoTitle' => 'Tennis4',
            'videoPicture' => 'tennis1.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoTitle' => 'Tennis5',
            'videoPicture' => 'tennis2.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoTitle' => 'Tennis6',
            'videoPicture' => 'tennis3.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoTitle' => 'Tennis7',
            'videoPicture' => 'tennis1.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoTitle' => 'Tennis8',
            'videoPicture' => 'tennis2.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoTitle' => 'Tennis9',
            'videoPicture' => 'tennis3.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoTitle' => 'Tennis10',
            'videoPicture' => 'tennis1.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoTitle' => 'Tennis11',
            'videoPicture' => 'tennis2.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoTitle' => 'Tennis12',
            'videoPicture' => 'tennis3.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoTitle' => 'Volleyball1',
            'videoPicture' => 'volleyball1.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoTitle' => 'Volleyball2',
            'videoPicture' => 'volleyball2.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoTitle' => 'Volleyball3',
            'videoPicture' => 'volleyball3.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoTitle' => 'Volleyball4',
            'videoPicture' => 'volleyball1.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoTitle' => 'Volleyball5',
            'videoPicture' => 'volleyball2.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoTitle' => 'Volleyball6',
            'videoPicture' => 'volleyball3.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoTitle' => 'Volleyball7',
            'videoPicture' => 'volleyball1.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoTitle' => 'Volleyball8',
            'videoPicture' => 'volleyball2.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoTitle' => 'Volleyball9',
            'videoPicture' => 'volleyball3.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoTitle' => 'Volleyball10',
            'videoPicture' => 'volleyball1.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoTitle' => 'Volleyball11',
            'videoPicture' => 'volleyball2.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoTitle' => 'Volleyball12',
            'videoPicture' => 'volleyball3.jpg',
            'category' => 'Volleyball'
        ],
    ];

    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        foreach (self::VIDEOS as $value) {
            $video = new Video();
            $video->setTitle($value['videoTitle']);
            $video->setDescription($faker->text(50));
            $video->setIsPremium((bool) rand(0, 1));
            $video->setvideoLink($value['videoTitle'] . ".mp4");
            $video->setVideoPicture($value['videoPicture']);
            $video->setCategory(
                $this->getReference('category_' . $value['category'])
            );
            $manager->persist($video);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
