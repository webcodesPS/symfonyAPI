<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MenuRepository")
 */
class Menu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    private $name;

    private $enabled;

    private $page;

    private $left;

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

    public function getEnabled(): ?bool
    {
      return $this->enabled;
    }

    public function getPage(): ?Page
    {
      return $this->page;
    }

    public function getLeft(): ?int
    {
      return $this->left;
    }

    /**
     * @return Collection|ContentMenu[]
     */
    public function getContents(): Collection
    {
      return $this->contents;
    }
}
