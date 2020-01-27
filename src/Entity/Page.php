<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Page
{
    private $id;

    private $name;

    private $slug;

    private $enabled;

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

    public function getEnabled(): ?bool
    {
      return $this->enabled;
    }

    public function getContents(): Collection
    {
      return $this->contents;
    }
}
