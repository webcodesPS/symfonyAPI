<?php

namespace App\Http\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\Entity\Page;

class PageController extends AbstractController
{
  private function serializer($data)
  {
    $encoders = [new JsonEncoder()];
    $normalizers = [new ObjectNormalizer()];

    $serializer = new Serializer($normalizers, $encoders);

    return $serializer->serialize($data, 'json');
  }

  public function index(Request $request)
  {
    $response = new Response();
    $response->setContent($this->serializer($this->getDoctrine()->getRepository(Page::class)->findPage($request->getLocale())));
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }

  public function page(Request $request, $page)
  {
    $response = new Response();
    $response->setContent($this->serializer( $this->getDoctrine()->getRepository(Page::class)->findPage($request->getLocale(), $page)));
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }
}
