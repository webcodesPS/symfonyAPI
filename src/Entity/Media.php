<?php

namespace App\Entity;

class Media
{
    private $id;

    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
      return $this->name;
    }
}
