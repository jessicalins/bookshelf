<?php

namespace App\Entity;

use App\Repository\BookshelfRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Config\BookshelfType;

#[ORM\Entity(repositoryClass: BookshelfRepository::class)]
class Bookshelf
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, enumType: BookshelfType::class)]
    private BookshelfType $type;

    #[ORM\OneToMany(mappedBy: 'bookshelf', targetEntity: Volume::class)]
    private Collection $volumes;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'bookshelves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reader $owner = null;

    public function __construct()
    {
        $this->type = BookshelfType::ToRead;
        $this->volumes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): BookshelfType
    {
        return $this->type;
    }

    public function setType(BookshelfType $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Volume>
     */
    public function getVolumes(): Collection
    {
        return $this->volumes;
    }

    public function addVolume(Volume $volume): static
    {
        if (!$this->volumes->contains($volume)) {
            $this->volumes->add($volume);
            $volume->setBookshelf($this);
        }

        return $this;
    }

    public function removeVolume(Volume $volume): static
    {
        if ($this->volumes->removeElement($volume)) {
            // set the owning side to null (unless already changed)
            if ($volume->getBookshelf() === $this) {
                $volume->setBookshelf(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getOwner(): ?Reader
    {
        return $this->owner;
    }

    public function setOwner(?Reader $owner): static
    {
        $this->owner = $owner;

        return $this;
    }
}
