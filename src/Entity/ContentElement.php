<?php

namespace App\Entity;

class ContentElement
{
  private $id;

  private $locale;

  private $content;

  private $title;

  private $element;

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

  public function getTitle(): ?string
  {
    return $this->title;
  }

  public function getElement(): ?Element
  {
    return $this->element;
  }
}
