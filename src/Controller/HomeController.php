<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class HomeController extends AbstractController
{

    public function __construct(
        private HttpClientInterface $client,
    ) {
    }

    #[Route('/', name: 'home')]
    public function index(PostRepository $postRepository): Response
    {
        $response = $this->client->request(
            'GET',
            'http://127.0.0.1:8000/api/posts?page=1'
        );
        $posts = $response->toArray();
        return $this->render('home/index.html.twig', [
            'header_title' => 'Blog de Rayan',
            'posts' => $posts['member']
        ]);
    }
}
