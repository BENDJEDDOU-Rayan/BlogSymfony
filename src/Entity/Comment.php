<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    private ?string $content = null;


    #[ORM\Column(length: 10)]
    private ?string $lang = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $postAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(string $lang): static
    {
        $this->lang = $lang;

        return $this;
    }

    public function getPostAt(): ?\DateTimeImmutable
    {
        return $this->postAt;
    }

    public function setPostAt(\DateTimeImmutable $postAt): static
    {
        $this->postAt = $postAt;

        return $this;
    }
}
