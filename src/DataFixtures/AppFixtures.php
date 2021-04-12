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
            $article->setDescription($faker->text);
            $article->setUrlImage($faker->imageUrl($width = 640, $height = 480));
            $article->setCategorie($faker->randomElement($array = array ('Maison','Bien-être','Cuisine','Salle de bain','Garage','Cosmétique','Homme','Femme')));
            $article->setPrice(mt_rand(10, 100));
            $article->setCreatedAt($faker->datetime);
            $manager->persist($article);
        }

        $manager->flush();
    }
}
