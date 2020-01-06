<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContentMenuRepository")
 */
class ContentMenu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    private $title;

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

    public function getTitle(): ?string
    {
      return $this->title;
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