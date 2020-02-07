<?php

namespace App\Entity;

class ContentMenu
{
    private $id;

    private $locale;

    private $content;

    private $menu;

    public function __toString()
    {
      return $this->getLocale() ?: '';
    }

    public function getId(): ?int
    {
      return $this->id;
    }

    public function getLocale(): ?string
    {
      return $this->locale;
    }

    public function getContent(): ?string
    {
      return $this->content;
    }

    public function getMenu(): ?Menu
    {
      return $this->menu;
    }
}
