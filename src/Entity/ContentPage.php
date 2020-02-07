<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="ContentPageRepository")
 */
class ContentPage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    private $locale;

    private $position;

    private $content;

    private $page;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString()
    {
      return $this->page ?: '';
    }

    public function getLocale(): ?string
    {
      return $this->locale;
    }

    public function getPosition(): ?int
    {
      return $this->position;
    }

    public function getContent(): ?string
    {
      return $this->content;
    }

    public function getPage(): ?Page
    {
      return $this->page;
    }
}
