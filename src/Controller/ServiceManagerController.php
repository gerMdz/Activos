<?php

namespace App\Controller;

use App\Entity\ServiceManager;
use App\Form\ServiceManagerType;
use App\Repository\ServiceManagerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/servicemanager")
 */
class ServiceManagerController extends AbstractController
{
    /**
     * @Route("/", name="service_manager_index", methods={"GET"})
     */
    public function index(ServiceManagerRepository $serviceManagerRepository): Response
    {
        return $this->render('service_manager/index.html.twig', [
            'service_managers' => $serviceManagerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="service_manager_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $serviceManager = new ServiceManager();
        $form = $this->createForm(ServiceManagerType::class, $serviceManager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($serviceManager);
            $entityManager->flush();

            return $this->redirectToRoute('service_manager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('service_manager/new.html.twig', [
            'service_manager' => $serviceManager,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="service_manager_show", methods={"GET"})
     */
    public function show(ServiceManager $serviceManager): Response
    {
        return $this->render('service_manager/show.html.twig', [
            'service_manager' => $serviceManager,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="service_manager_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ServiceManager $serviceManager, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ServiceManagerType::class, $serviceManager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('service_manager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('service_manager/edit.html.twig', [
            'service_manager' => $serviceManager,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="service_manager_delete", methods={"POST"})
     */
    public function delete(Request $request, ServiceManager $serviceManager, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$serviceManager->getId(), $request->request->get('_token'))) {
            $entityManager->remove($serviceManager);
            $entityManager->flush();
        }

        return $this->redirectToRoute('service_manager_index', [], Response::HTTP_SEE_OTHER);
    }
}
