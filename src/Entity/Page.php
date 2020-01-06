<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PageRepository")
 */
class Page
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    private $name;

    private $slug;

    private $contents;

    public function __construct()
    {
      $this->contents = new ArrayCollection();
    }

      public function getId(): ?int
      {
          return $this->id;
      }

    public function getName(): ?string
    {
      return $this->name;
    }

    public function getSlug(): ?string
    {
      return $this->slug;
    }

    public function getContents(): Collection
    {
      return $this->contents;
    }
}
