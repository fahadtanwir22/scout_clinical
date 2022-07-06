<?php

namespace App\Controller;

use App\Entity\Bicycle;
use App\Form\BicycleType;
use App\Repository\BicycleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bicycle")
 */
class BicycleController extends AbstractController
{
    /**
     * @Route("/", name="app_bicycle_index", methods={"GET"})
     */
    public function index(BicycleRepository $bicycleRepository): Response
    {
        return $this->render('bicycle/index.html.twig', [
            'bicycles' => $bicycleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_bicycle_new", methods={"GET", "POST"})
     */
    public function new(Request $request, BicycleRepository $bicycleRepository): Response
    {
        $bicycle = new Bicycle();
        $form = $this->createForm(BicycleType::class, $bicycle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bicycleRepository->add($bicycle, true);

            return $this->redirectToRoute('app_bicycle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bicycle/new.html.twig', [
            'bicycle' => $bicycle,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_bicycle_show", methods={"GET"})
     */
    public function show(Bicycle $bicycle): Response
    {
        return $this->render('bicycle/show.html.twig', [
            'bicycle' => $bicycle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_bicycle_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Bicycle $bicycle, BicycleRepository $bicycleRepository): Response
    {
        $form = $this->createForm(BicycleType::class, $bicycle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bicycleRepository->add($bicycle, true);

            return $this->redirectToRoute('app_bicycle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bicycle/edit.html.twig', [
            'bicycle' => $bicycle,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_bicycle_delete", methods={"POST"})
     */
    public function delete(Request $request, Bicycle $bicycle, BicycleRepository $bicycleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bicycle->getId(), $request->request->get('_token'))) {
            $bicycleRepository->remove($bicycle, true);
        }

        return $this->redirectToRoute('app_bicycle_index', [], Response::HTTP_SEE_OTHER);
    }
}
