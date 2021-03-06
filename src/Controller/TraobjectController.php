<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Traobject;
use App\Entity\State;
use App\Form\TraobjectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/traobject")
 */
class TraobjectController extends BaseController
{


    /**
     * @Route("/lost", name="traobjects_lost")
     */
    public function losts(): Response
    {
        $traobjects_lost = $this->getDoctrine()->getRepository(Traobject::class)->findTraobjectByState(State::LOST);


        return $this->render('traobject/traobjects_lost.html.twig', ["traobjects_lost" => $traobjects_lost]);
    }

    /**
     * @Route("/found", name="traobjects_found")
     */
    public function founds(): Response
    {
        $traobjects_found = $this->getDoctrine()->getRepository(Traobject::class)->findTraobjectByState(State::FOUND);


        return $this->render('traobject/traobjects_found.html.twig', ["traobjects_found" => $traobjects_found]);
    }


    /**
     * @Route("/new", name="traobject_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $traobject = new Traobject();
        $form = $this->createForm(TraobjectType::class, $traobject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $traobject->setUser($this->getUser());

            $em->persist($traobject);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('traobject/new.html.twig', [
            'traobject' => $traobject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="traobject_show", methods="GET")
     */
    public function show(Traobject $traobject): Response
    {
        $comments = $this->getDoctrine()->getRepository(Comment::class)->findBy(['traobject' => $traobject]);

        return $this->render('traobject/show.html.twig', ['comments' => $comments, 'traobject' => $traobject]);
    }


    /**
     * @Route("/{id}/edit", name="traobject_edit", methods="GET|POST")
     */
    public function edit(Request $request, Traobject $traobject): Response
    {
        $form = $this->createForm(TraobjectType::class, $traobject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('traobject_index', ['id' => $traobject->getId()]);
        }

        return $this->render('traobject/edit.html.twig', [
            'traobject' => $traobject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="traobject_delete", methods="DELETE")
     */
    public function delete(Request $request, Traobject $traobject): Response
    {
        if ($this->isCsrfTokenValid('delete'.$traobject->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($traobject);
            $em->flush();
        }

        return $this->redirectToRoute('traobject_index');
    }
}
