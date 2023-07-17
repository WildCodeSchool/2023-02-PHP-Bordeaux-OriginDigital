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
            'videoLink' => 'Basketball1.mp4',
            'videoPicture' => 'basketball1.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoLink' => 'Basketball2.mp4',
            'videoPicture' => 'basketball2.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoLink' => 'Basketball3.mp4',
            'videoPicture' => 'basketball3.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoLink' => 'Basketball4.mp4',
            'videoPicture' => 'basketball1.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoLink' => 'Basketball5.mp4',
            'videoPicture' => 'basketball2.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoLink' => 'Basketball6.mp4',
            'videoPicture' => 'basketball3.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoLink' => 'Basketball7.mp4',
            'videoPicture' => 'basketball1.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoLink' => 'Basketball8.mp4',
            'videoPicture' => 'basketball2.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoLink' => 'Basketball9.mp4',
            'videoPicture' => 'basketball3.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoLink' => 'Basketball10.mp4',
            'videoPicture' => 'basketball1.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoLink' => 'Basketball11.mp4',
            'videoPicture' => 'basketball2.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoLink' => 'Basketball12.mp4',
            'videoPicture' => 'basketball3.jpg',
            'category' => 'Basketball'
        ],
        [
            'videoLink' => 'Football1.mp4',
            'videoPicture' => 'football1.jpg',
            'category' => 'Football'
        ],
        [
            'videoLink' => 'Football2.mp4',
            'videoPicture' => 'football2.jpg',
            'category' => 'Football'
        ],
        [
            'videoLink' => 'Football3.mp4',
            'videoPicture' => 'football3.jpg',
            'category' => 'Football'
        ],
        [
            'videoLink' => 'Football4.mp4',
            'videoPicture' => 'football1.jpg',
            'category' => 'Football'
        ],
        [
            'videoLink' => 'Football5.mp4',
            'videoPicture' => 'football2.jpg',
            'category' => 'Football'
        ],
        [
            'videoLink' => 'Football6.mp4',
            'videoPicture' => 'football3.jpg',
            'category' => 'Football'
        ],
        [
            'videoLink' => 'Football7.mp4',
            'videoPicture' => 'football1.jpg',
            'category' => 'Football'
        ],
        [
            'videoLink' => 'Football8.mp4',
            'videoPicture' => 'football2.jpg',
            'category' => 'Football'
        ],
        [
            'videoLink' => 'Football9.mp4',
            'videoPicture' => 'football3.jpg',
            'category' => 'Football'
        ],
        [
            'videoLink' => 'Football10.mp4',
            'videoPicture' => 'football1.jpg',
            'category' => 'Football'
        ],
        [
            'videoLink' => 'Football11.mp4',
            'videoPicture' => 'football2.jpg',
            'category' => 'Football'
        ],
        [
            'videoLink' => 'Football12.mp4',
            'videoPicture' => 'football3.jpg',
            'category' => 'Football'
        ],
        [
            'videoLink' => 'Surf1.mp4',
            'videoPicture' => 'surf1.jpg',
            'category' => 'Surf'
        ],
        [
            'videoLink' => 'Surf2.mp4',
            'videoPicture' => 'surf2.jpg',
            'category' => 'Surf'
        ],
        [
            'videoLink' => 'Surf3.mp4',
            'videoPicture' => 'surf3.jpg',
            'category' => 'Surf'
        ],
        [
            'videoLink' => 'Surf4.mp4',
            'videoPicture' => 'surf1.jpg',
            'category' => 'Surf'
        ],
        [
            'videoLink' => 'Surf5.mp4',
            'videoPicture' => 'surf2.jpg',
            'category' => 'Surf'
        ],
        [
            'videoLink' => 'Surf6.mp4',
            'videoPicture' => 'surf3.jpg',
            'category' => 'Surf'
        ],
        [
            'videoLink' => 'Surf7.mp4',
            'videoPicture' => 'surf1.jpg',
            'category' => 'Surf'
        ],
        [
            'videoLink' => 'Surf8.mp4',
            'videoPicture' => 'surf2.jpg',
            'category' => 'Surf'
        ],
        [
            'videoLink' => 'Surf9.mp4',
            'videoPicture' => 'surf3.jpg',
            'category' => 'Surf'
        ],
        [
            'videoLink' => 'Surf10.mp4',
            'videoPicture' => 'surf1.jpg',
            'category' => 'Surf'
        ],
        [
            'videoLink' => 'Surf11.mp4',
            'videoPicture' => 'surf2.jpg',
            'category' => 'Surf'
        ],
        [
            'videoLink' => 'Surf12.mp4',
            'videoPicture' => 'surf3.jpg',
            'category' => 'Surf'
        ],
        [
            'videoLink' => 'Tennis1.mp4',
            'videoPicture' => 'tennis1.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoLink' => 'Tennis2.mp4',
            'videoPicture' => 'tennis2.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoLink' => 'Tennis3.mp4',
            'videoPicture' => 'tennis3.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoLink' => 'Tennis4.mp4',
            'videoPicture' => 'tennis1.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoLink' => 'Tennis5.mp4',
            'videoPicture' => 'tennis2.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoLink' => 'Tennis6.mp4',
            'videoPicture' => 'tennis3.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoLink' => 'Tennis7.mp4',
            'videoPicture' => 'tennis1.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoLink' => 'Tennis8.mp4',
            'videoPicture' => 'tennis2.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoLink' => 'Tennis9.mp4',
            'videoPicture' => 'tennis3.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoLink' => 'Tennis10.mp4',
            'videoPicture' => 'tennis1.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoLink' => 'Tennis11.mp4',
            'videoPicture' => 'tennis2.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoLink' => 'Tennis12.mp4',
            'videoPicture' => 'tennis3.jpg',
            'category' => 'Tennis'
        ],
        [
            'videoLink' => 'Volleyball1.mp4',
            'videoPicture' => 'volleyball1.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoLink' => 'Volleyball2.mp4',
            'videoPicture' => 'volleyball2.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoLink' => 'Volleyball3.mp4',
            'videoPicture' => 'volleyball3.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoLink' => 'Volleyball4.mp4',
            'videoPicture' => 'volleyball1.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoLink' => 'Volleyball5.mp4',
            'videoPicture' => 'volleyball2.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoLink' => 'Volleyball6.mp4',
            'videoPicture' => 'volleyball3.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoLink' => 'Volleyball7.mp4',
            'videoPicture' => 'volleyball1.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoLink' => 'Volleyball8.mp4',
            'videoPicture' => 'volleyball2.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoLink' => 'Volleyball9.mp4',
            'videoPicture' => 'volleyball3.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoLink' => 'Volleyball10.mp4',
            'videoPicture' => 'volleyball1.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoLink' => 'Volleyball11.mp4',
            'videoPicture' => 'volleyball2.jpg',
            'category' => 'Volleyball'
        ],
        [
            'videoLink' => 'Volleyball12.mp4',
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
            $video->setTitle($value['videoLink']);
            $video->setDescription($faker->text(50));
            $video->setIsPremium((bool) rand(0, 1));
            $video->setVideoLink($value['videoLink']);
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
