<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Element
{
    private $id;

    private $name;

    private $contents;

    private $collections;

    public function __toString()
    {
      return $this->name ?: '';
    }

    public function __construct()
    {
      $this->collections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName()
    {
      return $this->name;
    }

    /**
     * @return Collection|ContentElement[]
     */
    public function getContents(): Collection
    {
      return $this->contents;
    }

    public function getCollections()
    {
      return $this->collections;
    }
}
