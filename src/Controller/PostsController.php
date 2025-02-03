<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PostsController extends AbstractController
{
    #[Route('/posts/create', name: 'app_posts', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $content = $request->request->get('content');
        if(!empty(trim($content))){
            $post = new Post();
            $post->setContent($content);
            $nowImmutable = new \DateTimeImmutable();
            $post->setPostAt($nowImmutable);
            $now = new \DateTime();
            $post->setLastEdited($now);

            $entityManager->persist($post);
            $entityManager->flush();
            $this->addFlash('success', 'Post créé avec succès !');
        } else {
            $this->addFlash('error', 'Le contenu du post ne peut pas être vide.');
        }
        return $this->redirectToRoute('home');
    }
}
