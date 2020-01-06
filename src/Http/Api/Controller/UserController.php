<?php
/**
 * Created by PhpStorm.
 * User: przemo
 * Date: 06.12.19
 * Time: 17:56
 */

namespace App\Http\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\Entity\User;

class UserController extends AbstractController
{
    public function index()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $response = new Response();
        $response->setContent($serializer->serialize($this->getDoctrine()->getRepository(User::class)->findOneById(1), 'json'));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
