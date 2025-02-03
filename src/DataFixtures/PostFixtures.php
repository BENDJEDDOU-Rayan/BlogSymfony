<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i < 15; $i++){
            $post = new Post();
            $post->setContent("Ceci est le post numéro " . $i . " !");
            $now = new \DateTimeImmutable();
            $post->setPostAt($now);
            $last = new \DateTime();
            $post->setLastEdited($last);
            $manager->persist($post);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
