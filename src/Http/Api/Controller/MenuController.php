<?php

namespace App\Http\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Menu;

class MenuController extends AbstractController
{
  public function index(Request $request)
  {
    return $this->json($this->getDoctrine()->getRepository(Menu::class)->findMenu($request->getLocale()));
  }
}
