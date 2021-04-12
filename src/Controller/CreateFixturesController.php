<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class CreateFixturesController extends AbstractController
{
    /**
     * @Route("/create/fixtures", name="create_fixtures")
     */
    public function index(EntityManagerInterface $em): Response
    {
        $generator = \Faker\Factory::create('fr_FR');
        $populator = new \Faker\ORM\Doctrine\Populator($generator, $em);
        $populator->addEntity('Article', 1);
        $insertedPKs = $populator->execute();
        return $this->render('create_fixtures/index.html.twig', [
            'controller_name' => 'CreateFixturesController',
        ]);
    }
}
