<?php

namespace App\Controller;

use App\Entity\Compagnie;
use App\Form\CompagnieType;
use App\Repository\CompagnieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/compagnie")
 */
class CompagnieController extends AbstractController
{
    /**
     * @Route("/", name="compagnie_index", methods={"GET"})
     */
    public function index(CompagnieRepository $compagnieRepository): Response
    {
        return $this->render('compagnie/index.html.twig', ['compagnies' => $compagnieRepository->findAll()]);
    }

    /**
     * @Route("/new", name="compagnie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $compagnie = new Compagnie();
        $form = $this->createForm(CompagnieType::class, $compagnie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($compagnie);
            $entityManager->flush();

            return $this->redirectToRoute('compagnie_index');
        }

        return $this->render('compagnie/new.html.twig', [
            'compagnie' => $compagnie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="compagnie_show", methods={"GET"})
     */
    public function show(Compagnie $compagnie): Response
    {
        return $this->render('compagnie/show.html.twig', ['compagnie' => $compagnie]);
    }

    /**
     * @Route("/{id}/edit", name="compagnie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Compagnie $compagnie): Response
    {
        $form = $this->createForm(CompagnieType::class, $compagnie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('compagnie_index', ['id' => $compagnie->getId()]);
        }

        return $this->render('compagnie/edit.html.twig', [
            'compagnie' => $compagnie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="compagnie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Compagnie $compagnie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$compagnie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($compagnie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('compagnie_index');
    }
}
