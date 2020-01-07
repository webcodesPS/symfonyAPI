<?php


namespace App\Http\Api\Controller;


use App\Entity\Element;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class AppController extends AbstractController
{
  private function serializer($data)
  {
    $encoders = [new JsonEncoder()];
    $normalizers = [new ObjectNormalizer()];

    $serializer = new Serializer($normalizers, $encoders);

    return $serializer->serialize($data, 'json');
  }

  public function element()
  {
    $response = new Response();
    $response->setContent($this->serializer($this->getDoctrine()->getRepository(Element::class)->findElements()));
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }
}