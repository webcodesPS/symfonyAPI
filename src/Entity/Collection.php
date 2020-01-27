<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Collection
{
    private $id;

    private $name;

    private $elements;

    private $media;

    private $category;

    private $contents;

    public function __toString()
    {
      return $this->name ?: '';
    }

    public function __construct()
    {
      $this->elements = new ArrayCollection();
      $this->contents = new ArrayCollection();
    }

    public function getId(): ?int
    {
      return $this->id;
    }

    public function getName()
    {
      return $this->name;
    }

    public function getElements()
    {
      return $this->elements;
    }

    public function getCategory()
    {
      return $this->category;
    }

    public function getMedia()
    {
      return $this->media;
    }

    public function getContents(): ContentCollection
    {
      return $this->contents;
    }
}
