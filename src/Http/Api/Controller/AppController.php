<?php

namespace App\Http\Api\Controller;

use App\Entity\Element;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppController extends AbstractController
{
  public function element()
  {
    return $this->json($this->getDoctrine()->getRepository(Element::class)->findElements());
  }
}
