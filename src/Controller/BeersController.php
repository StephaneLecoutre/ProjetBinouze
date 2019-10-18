<?php

namespace App\Controller;

use App\Entity\Beers;
use App\Entity\BeerSearch;
use App\Form\BeerSearchType;
use App\Form\BeersType;
use App\Repository\BeersRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/beers")
 */
class BeersController extends AbstractController
{
    /**
     * @var BeersRepository
     */
    private $beersRepository;

    public function __construct(BeersRepository $beersRepository)
    {
        $this->beersRepository = $beersRepository;
    }

    /**
     * @Route("/", name="beers_index", methods={"GET"})
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        $search = new BeerSearch();
        $form = $this->createForm(BeerSearchType::class , $search);
        $form -> handleRequest($request);

        $beers = $paginator->paginate(
            $this->beersRepository->findAllVisibleQuery($search),
            $request->query->getInt('page',1),
            8
        );

        return $this->render('beers/index.html.twig', [
            'beers' => $beers,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new", name="beers_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $beer = new Beers();
        $form = $this->createForm(BeersType::class, $beer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($beer);
            $entityManager->flush();

            return $this->redirectToRoute('beers_index');
        }

        return $this->render('beers/new.html.twig', [
            'beer' => $beer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="beers_show", methods={"GET"})
     */
    public function show(Beers $beer): Response
    {
        return $this->render('beers/show.html.twig', [
            'beer' => $beer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="beers_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Beers $beer): Response
    {
        $form = $this->createForm(BeersType::class, $beer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('beers_index');
        }

        return $this->render('beers/edit.html.twig', [
            'beer' => $beer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="beers_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Beers $beer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$beer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($beer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('beers_index');
    }
}
