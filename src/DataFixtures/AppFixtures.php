<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 150; $i++) {
            $article = new Article();
            $article->setName($faker->name);
            $article->setDescription($faker->text);
            $article->setUrlImage($faker->imageUrl($width = 640, $height = 480));
            $article->setCategorie($faker->randomElement($array = array ('Maison','Bien-être','Cuisine','Salle de bain','Garage','Cosmétique','Homme','Femme','Enfant','Jouet')));
            $article->setPrice(mt_rand(10, 100));
            $article->setCreatedAt($faker->datetime);
            $manager->persist($article);
        }

        for ($i = 0; $i < 10; $i++) {
            $categorie = new Categorie();
            $categorie->setName($faker->randomElement($array = array ('Maison','Bien-être','Cuisine','Salle de bain','Garage','Cosmétique','Homme','Femme','Enfant','Jouet'), $count = $i));
            $categorie->setCreatedAt($faker->datetime);
            $manager->persist($categorie);
        }

        for ($i = 0; $i < 50; $i++) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setFullname($faker->firstName);
            $user->setCreatedAt($faker->datetime);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
