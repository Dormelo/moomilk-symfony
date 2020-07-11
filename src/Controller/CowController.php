<?php
// src/Controller/CowController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CowController extends AbstractController
{
    /**
     * @Route("/cow/add")
     */
    public function add(): Response
    {
        return new Response(
            '<html><body>Add cow</body></html>'
        );
    }

    /**
     * @Route("/cow")
     */
    public function index()
    {
        return new Response(
            '<html><body>List cow</body></html>'
        );
    }

    /**
     * @Route("/cow/{matricule}")
     */
    public function show($matricule)
    {
        return $this->render('cow/show.html.twig', [
            'matricule' => $matricule,
        ]);
    }


}
