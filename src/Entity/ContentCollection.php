<?php

namespace App\Entity;

class ContentCollection
{
    private $id;

    private $collection;

    private $locale;

    private $name;

    private $content;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCollection(): ?Collection
    {
      return $this->collection;
    }

    public function getLocale(): ?string
    {
      return $this->locale;
    }

    public function getName(): ?string
    {
      return $this->name;
    }

    public function getContent(): ?string
    {
      return $this->content;
    }
}
