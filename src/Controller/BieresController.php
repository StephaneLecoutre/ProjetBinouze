<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BieresController extends AbstractController
{
    /**
     * @Route("/bieres", name="bieres")
     */
    public function index()
    {
        return $this->render('bieres/index.html.twig', [
            'controller_name' => 'BieresController',
        ]);
    }
}
