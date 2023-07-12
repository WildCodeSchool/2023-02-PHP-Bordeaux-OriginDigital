<?php

namespace App\Entity;

use App\Repository\AdvertisementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: AdvertisementRepository::class)]
#[Vich\Uploadable()]
class Advertisement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $thumbnail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $link = null;
    #[Vich\UploadableField(mapping: 'advertisement_file', fileNameProperty: 'Link')]
    private ?File $advertisementFile = null;

    /**
     * @Assert\File(
     *     maxSize = "100M",
     *     mimeTypes = {"videos/mp4", "videos/mpeg"},
     *     mimeTypesMessage = "Veuillez télécharger une vidéo valide (MP4 ou MPEG)"
     * )
     */
    private mixed $file;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAT = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFile(): mixed
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile(mixed $file): void
    {
        $this->file = $file;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): static
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): static
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getAdvertisementFile(): ?File
    {
        return $this->advertisementFile;
    }

    /**
     * @param File|null $advertisementFile
     */
    public function setAdvertisementFile(?File $advertisementFile): void
    {
        $this->advertisementFile = $advertisementFile;
    }

    public function getUpdatedAT(): ?\DateTimeInterface
    {
        return $this->updatedAT;
    }
}
