<?php

namespace App\Controller;

use App\Entity\Vole;
use App\Form\VoleType;
use App\Repository\VoleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vole")
 */
class VoleController extends AbstractController
{
    /**
     * @Route("/", name="vole_index", methods={"GET"})
     */
    public function index(VoleRepository $voleRepository): Response
    {
        return $this->render('vole/index.html.twig', ['voles' => $voleRepository->findAll()]);
    }

    /**
     * @Route("/new", name="vole_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $vole = new Vole();
        $form = $this->createForm(VoleType::class, $vole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vole);
            $entityManager->flush();
  
            return $this->redirectToRoute('vole_index');
        }

        return $this->render('vole/new.html.twig', [
            'vole' => $vole,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vole_show", methods={"GET"})
     */
    public function show(Vole $vole): Response
    {
        return $this->render('vole/show.html.twig', ['vole' => $vole]);
    }

    /**
     * @Route("/{id}/edit", name="vole_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vole $vole): Response
    {
        $form = $this->createForm(VoleType::class, $vole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vole_index', ['id' => $vole->getId()]);
        }

        return $this->render('vole/edit.html.twig', [
            'vole' => $vole,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vole_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Vole $vole): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vole->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vole);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vole_index');
    }
}
