<?php

namespace App\Entity;

use App\Repository\ReaderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReaderRepository::class)]
class Reader
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'reviewer', targetEntity: Review::class)]
    private Collection $reviews;

    #[ORM\OneToMany(mappedBy: 'owner', targetEntity: Bookshelf::class, orphanRemoval: true)]
    private Collection $bookshelves;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
        $this->bookshelves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): static
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setReviewer($this);
        }

        return $this;
    }

    public function removeReview(Review $review): static
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getReviewer() === $this) {
                $review->setReviewer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Bookshelf>
     */
    public function getBookshelves(): Collection
    {
        return $this->bookshelves;
    }

    public function addBookshelf(Bookshelf $bookshelf): static
    {
        if (!$this->bookshelves->contains($bookshelf)) {
            $this->bookshelves->add($bookshelf);
            $bookshelf->setOwner($this);
        }

        return $this;
    }

    public function removeBookshelf(Bookshelf $bookshelf): static
    {
        if ($this->bookshelves->removeElement($bookshelf)) {
            // set the owning side to null (unless already changed)
            if ($bookshelf->getOwner() === $this) {
                $bookshelf->setOwner(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->name;
    }
}
