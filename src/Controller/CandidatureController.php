<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CandidaPosteType;

class CandidatureController extends AbstractController
{
    #[Route('/candidature', name: 'candidature')]
    public function candidature(): Response
    {
        $form = $this->createForm(CandidaPosteType::class);
        return $this->render('base/candidature-poste.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
