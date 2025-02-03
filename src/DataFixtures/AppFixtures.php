<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        for($i = 0; $i < 50; $i++) {
            $comment = new Comment();
            $comment->setContent("Mon commentaire n°" . $i);
            $lang = ($i % 2 == 0) ? "FR" : "EN";
            $comment->setLang($lang);
            $now = new \DateTimeImmutable();
            $comment->setPostAt($now);
            $manager->persist($comment);
        }
        // $manager->persist($product);

        $manager->flush();
    }
}
