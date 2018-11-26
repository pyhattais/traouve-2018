<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {

        $books = $this->getDoctrine()->getRepository(Book::class)->findLast(6);

        $categories = $this->getDoctrine()->getRepository(Category::class)->findBy(array(), array('name' => 'ASC'));

        return $this->render('default/homepage.html.twig', [
            "books" => $books,
            "categories" => $categories
        ]);
    }
}
