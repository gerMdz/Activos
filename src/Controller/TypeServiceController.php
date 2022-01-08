<?php

namespace App\Controller;

use App\Entity\TypeService;
use App\Form\TypeServiceType;
use App\Repository\TypeServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typeservice")
 */
class TypeServiceController extends AbstractController
{
    /**
     * @Route("/", name="type_service_index", methods={"GET"})
     */
    public function index(TypeServiceRepository $typeServiceRepository): Response
    {
        return $this->render('type_service/index.html.twig', [
            'type_services' => $typeServiceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_service_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typeService = new TypeService();
        $form = $this->createForm(TypeServiceType::class, $typeService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typeService);
            $entityManager->flush();

            return $this->redirectToRoute('type_service_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_service/new.html.twig', [
            'type_service' => $typeService,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="type_service_show", methods={"GET"})
     */
    public function show(TypeService $typeService): Response
    {
        return $this->render('type_service/show.html.twig', [
            'type_service' => $typeService,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_service_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, TypeService $typeService, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypeServiceType::class, $typeService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('type_service_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_service/edit.html.twig', [
            'type_service' => $typeService,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="type_service_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeService $typeService, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeService->getId(), $request->request->get('_token'))) {
            $entityManager->remove($typeService);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_service_index', [], Response::HTTP_SEE_OTHER);
    }
}
