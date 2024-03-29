<?php

namespace App\Entity;

use App\Repository\VideoRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: VideoRepository::class)]
#[Vich\Uploadable()]
class Video
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isPremium = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $videoLink = null;

    #[Vich\UploadableField(mapping: 'video_file', fileNameProperty: 'videoLink')]
    private ?File $videoFile = null;

    #[ORM\ManyToOne(inversedBy: 'videos')]
    private ?Category $category = null;

    /**
     * @Assert\File(
     *     maxSize = "100M",
     *     mimeTypes = {"video/mp4", "video/mpeg"},
     *     mimeTypesMessage = "Veuillez télécharger une vidéo valide (MP4 ou MPEG)"
     * )
     */
    private mixed $file;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'likes')]
    private Collection $likes;


    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $videoPicture = null;

    public function __construct()
    {
        $this->likes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isIsPremium(): ?bool
    {
        return $this->isPremium;
    }

    public function setIsPremium(?bool $isPremium): static
    {
        $this->isPremium = $isPremium;

        return $this;
    }

    public function getVideoLink(): ?string
    {
        return $this->videoLink;
    }

    public function setVideoLink(?string $videoLink): static
    {
        $this->videoLink = $videoLink;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
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


    /**
     * @return File|null
     */
    public function getVideoFile(): ?File
    {
        return $this->videoFile;
    }

    /**
     * @param File|null $videoFile
     */
    public function setVideoFile(?File $videoFile): void
    {
        $this->videoFile = $videoFile;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTimeInterface|null $updatedAt
     */
    public function setUpdatedAt(?DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return Collection<int, User>
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(User $like): static
    {
        if (!$this->likes->contains($like)) {
            $this->likes->add($like);
            $like->addLike($this);
        }

        return $this;
    }

    public function removeLike(User $like): static
    {
        if ($this->likes->removeElement($like)) {
            $like->removeLike($this);
        }

        return $this;
    }

    public function getVideoPicture(): ?string
    {
        return $this->videoPicture;
    }

    public function setVideoPicture(?string $videoPicture): static
    {
        $this->videoPicture = $videoPicture;

        return $this;
    }
}
