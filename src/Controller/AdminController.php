<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Equipe;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $repoEquipe = $this->getDoctrine()->getRepository(Equipe::class);
        $equipe = $repoEquipe->findAll();

        return $this->render('admin/index.html.twig', [
            'equipe' => $equipe
        ]);
    }
}
