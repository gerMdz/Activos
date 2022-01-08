<?php

namespace App\Controller;

use App\Entity\ServerData;
use App\Form\ServerDataType;
use App\Repository\ServerDataRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/serverdata")
 */
class ServerDataController extends AbstractController
{
    /**
     * @Route("/", name="server_data_index", methods={"GET"})
     */
    public function index(ServerDataRepository $serverDataRepository): Response
    {
        return $this->render('server_data/index.html.twig', [
            'server_datas' => $serverDataRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="server_data_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $serverDatum = new ServerData();
        $form = $this->createForm(ServerDataType::class, $serverDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($serverDatum);
            $entityManager->flush();

            return $this->redirectToRoute('server_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('server_data/new.html.twig', [
            'server_datum' => $serverDatum,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="server_data_show", methods={"GET"})
     */
    public function show(ServerData $serverDatum): Response
    {
        return $this->render('server_data/show.html.twig', [
            'server_datum' => $serverDatum,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="server_data_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ServerData $serverDatum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ServerDataType::class, $serverDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('server_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('server_data/edit.html.twig', [
            'server_datum' => $serverDatum,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="server_data_delete", methods={"POST"})
     */
    public function delete(Request $request, ServerData $serverDatum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$serverDatum->getId(), $request->request->get('_token'))) {
            $entityManager->remove($serverDatum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('server_data_index', [], Response::HTTP_SEE_OTHER);
    }
}
