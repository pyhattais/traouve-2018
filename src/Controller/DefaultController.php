<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\State;
use App\Entity\Traobject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        $traobjects_found = $this->getDoctrine()->getRepository(Traobject::class)->findLastTraobjectByState(State::FOUND, 2);

        $traobjects_lost = $this->getDoctrine()->getRepository(Traobject::class)->findLastTraobjectByState(State::LOST, 2);


        return $this->render('default/homepage.html.twig', [
            "traobjects_found" => $traobjects_found,
            "traobjects_lost" => $traobjects_lost
        ]);
    }

    public function footerCategory()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

    }
}
