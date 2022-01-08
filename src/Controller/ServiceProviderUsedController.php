<?php

namespace App\Controller;

use App\Entity\ServiceProviderUsed;
use App\Form\ServiceProviderUsedType;
use App\Repository\ServiceProviderUsedRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/serviceproviderused")
 */
class ServiceProviderUsedController extends AbstractController
{
    /**
     * @Route("/", name="service_provider_used_index", methods={"GET"})
     */
    public function index(ServiceProviderUsedRepository $serviceProviderUsedRepository): Response
    {
        return $this->render('service_provider_used/index.html.twig', [
            'service_provider_useds' => $serviceProviderUsedRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="service_provider_used_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $serviceProviderUsed = new ServiceProviderUsed();
        $form = $this->createForm(ServiceProviderUsedType::class, $serviceProviderUsed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($serviceProviderUsed);
            $entityManager->flush();

            return $this->redirectToRoute('service_provider_used_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('service_provider_used/new.html.twig', [
            'service_provider_used' => $serviceProviderUsed,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="service_provider_used_show", methods={"GET"})
     */
    public function show(ServiceProviderUsed $serviceProviderUsed): Response
    {
        return $this->render('service_provider_used/show.html.twig', [
            'service_provider_used' => $serviceProviderUsed,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="service_provider_used_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ServiceProviderUsed $serviceProviderUsed, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ServiceProviderUsedType::class, $serviceProviderUsed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('service_provider_used_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('service_provider_used/edit.html.twig', [
            'service_provider_used' => $serviceProviderUsed,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="service_provider_used_delete", methods={"POST"})
     */
    public function delete(Request $request, ServiceProviderUsed $serviceProviderUsed, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$serviceProviderUsed->getId(), $request->request->get('_token'))) {
            $entityManager->remove($serviceProviderUsed);
            $entityManager->flush();
        }

        return $this->redirectToRoute('service_provider_used_index', [], Response::HTTP_SEE_OTHER);
    }
}
