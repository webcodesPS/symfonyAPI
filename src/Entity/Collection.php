<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CollectionRepository")
 */
class Collection
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
      return $this->id;
    }

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $elements;

    /**
     * @var \MediaBundle\Entity\Media
     */
    private $media;

    public function __toString()
    {
      return $this->name ?: '';
    }

    /**
     * Constructor
     */
    public function __construct()
    {
      $this->elements = new ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return \App\Entity\Collection
     */
    public function setName($name)
    {
      $this->name = $name;

      return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
      return $this->name;
    }

    /**
     * Add elements
     *
     * @param Element $elements
     * @return Collection
     */
    public function addElement(Element $elements)
    {
      $this->elements[] = $elements;

      return $this;
    }

    /**
     * Remove elements
     *
     * @param Element $elements
     */
    public function removeElement(Element $elements)
    {
      $this->elements->removeElement($elements);
    }

    /**
     * Get elements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getElements()
    {
      return $this->elements;
    }

    /**
     * @var Category
     */
    private $category;


    /**
     * Set category
     *
     * @param Category $category
     * @return Collection
     */
    public function setCategory(Category $category = null)
    {
      $this->category = $category;

      return $this;
    }

    /**
     * Get category
     *
     * @return \App\Entity\Category
     */
    public function getCategory()
    {
      return $this->category;
    }

    /**
     * @return \MediaBundle\Entity\Media
     */
    public function getMedia()
    {
      return $this->media;
    }

    /**
     * @param \MediaBundle\Entity\Media $media
     */
    public function setMedia($media)
    {
      $this->media = $media;
    }
    /**
     * @var string
     */
    private $description;


    /**
     * Set description
     *
     * @param string $description
     * @return Collection
     */
    public function setDescription($description)
    {
      $this->description = $description;

      return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
      return $this->description;
    }
}
