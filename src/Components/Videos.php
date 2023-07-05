<?php

namespace App\Components;

use App\Entity\Video;
use App\Repository\VideoRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('videos')]
class VideosComponent
{
    public int $id;

    public function __construct(
        private VideoRepository $videoRepository
    ) {
    }

    public function getBlogpost(): Video
    {
        return $this->videoRepository->find($this->id);
    }
}
