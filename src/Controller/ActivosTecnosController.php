<?php

namespace App\Controller;

use App\Entity\ActivosTecnos;
use App\Form\ActivosTecnosType;
use App\Repository\ActivosTecnosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/activostecnos")
 */
class ActivosTecnosController extends AbstractController
{
    /**
     * @Route("/", name="activos_tecnos_index", methods={"GET"})
     */
    public function index(ActivosTecnosRepository $activosTecnosRepository): Response
    {
        return $this->render('activos_tecnos/index.html.twig', [
            'activos_tecnos' => $activosTecnosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="activos_tecnos_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $activosTecno = new ActivosTecnos();
        $form = $this->createForm(ActivosTecnosType::class, $activosTecno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($activosTecno);
            $entityManager->flush();

            return $this->redirectToRoute('activos_tecnos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('activos_tecnos/new.html.twig', [
            'activos_tecno' => $activosTecno,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="activos_tecnos_show", methods={"GET"})
     */
    public function show(ActivosTecnos $activosTecno): Response
    {
        return $this->render('activos_tecnos/show.html.twig', [
            'activos_tecno' => $activosTecno,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="activos_tecnos_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ActivosTecnos $activosTecno, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ActivosTecnosType::class, $activosTecno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('activos_tecnos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('activos_tecnos/edit.html.twig', [
            'activos_tecno' => $activosTecno,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="activos_tecnos_delete", methods={"POST"})
     */
    public function delete(Request $request, ActivosTecnos $activosTecno, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$activosTecno->getId(), $request->request->get('_token'))) {
            $entityManager->remove($activosTecno);
            $entityManager->flush();
        }

        return $this->redirectToRoute('activos_tecnos_index', [], Response::HTTP_SEE_OTHER);
    }
}
