<?php

namespace App\Entity;

use App\Repository\BookshelfRepository;
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

    public function __construct()
    {
        $this->type = BookshelfType::ToRead;
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
}
