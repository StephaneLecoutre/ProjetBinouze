<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InfosController extends AbstractController
{
    /**
     * @Route("/infos", name="infos")
     */
    public function index()
    {
        return $this->render('infos/index.html.twig');
    }
}