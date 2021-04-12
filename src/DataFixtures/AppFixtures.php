<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 1; $i++) {
            $article = new Article();
            $article->setName($faker->name);
            $article->setDescription($faker->name);
            $article->setUrlImage($faker->name);
            $article->setCategorie($faker->name);
            $article->setPrice(mt_rand(10, 100));
            $article->setCreatedAt($faker->datetime);
            $manager->persist($article);
        }

        $manager->flush();
    }
}
