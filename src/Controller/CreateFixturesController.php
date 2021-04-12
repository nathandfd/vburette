<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateFixturesController extends AbstractController
{
    /**
     * @Route("/create/fixtures", name="create_fixtures")
     */
    public function index(): Response
    {
        return $this->render('create_fixtures/index.html.twig', [
            'controller_name' => 'CreateFixturesController',
        ]);
    }
}
