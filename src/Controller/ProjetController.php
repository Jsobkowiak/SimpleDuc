<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProjetType;

class ProjetController extends AbstractController
{
    #[Route('/projet', name: 'projet')]
    public function index(): Response
    {
        $form = $this->createForm(ProjetType::class);
        return $this->render('projet/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
}
