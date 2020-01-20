<?php

namespace App\Http\Api\Controller;

use App\Entity\Collection;
use App\Entity\Element;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AppController extends AbstractController
{
  public function element(Request $request)
  {
    return $this->json($this->getDoctrine()->getRepository(Element::class)->findElements($request->getLocale()));
  }

  public function collection(Request $request)
  {
    return $this->json(
      $this->getDoctrine()->getRepository(Collection::class)
        ->findCollections(
          $request->getLocale(),
          json_decode($request->getContent(), true)
        )
    );
  }
}
