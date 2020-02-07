<?php

namespace App\Http\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Page;

class PageController extends AbstractController
{
  public function index(Request $request)
  {
    return $this->json($this->getDoctrine()->getRepository(Page::class)->findPage($request->getLocale()));
  }

  public function page(Request $request, $page)
  {
    return $this->json($this->getDoctrine()->getRepository(Page::class)->findPage($request->getLocale(), $page));
  }
}
