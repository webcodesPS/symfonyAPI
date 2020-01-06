<?php

namespace App\Http\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\Entity\Menu;

class MenuController extends AbstractController
{
  public function index(Request $request)
  {
    $encoders = [new JsonEncoder()];
    $normalizers = [new ObjectNormalizer()];

    $serializer = new Serializer($normalizers, $encoders);

    $response = new Response();
    $response->setContent($serializer->serialize($this->getDoctrine()->getRepository(Menu::class)->findMenu($request->getLocale()), 'json'));
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }
}