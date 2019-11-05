<?php

namespace App\Controller;

use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function __construct(Environment $twig)
    {
        $this->twig=$twig;
    }
    
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
/**
 * @Route("mentions_legales", name="mentions_legales")
 * @return Response
 */
public function mentions(): Response
{
    return $this->render('home/mentions_legales.html.twig');
}


}
