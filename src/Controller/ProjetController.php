<?php

namespace App\Controller;

use App\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProjetType;
use DateTime;
use Symfony\Component\HttpFoundation\Request;

class ProjetController extends AbstractController
{
    #[Route('/projet', name: 'projet')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(ProjetType::class);
        $projet = new Projet();

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                
                
                $nom = $form['libelle']->getData();
                $description = $form['description']->getData();

                $projet->setLibelle($nom);
                $projet->setDescription($description);
                $projet->setDatedebut(new DateTime());
                $projet->setDatefin(null);



                $em = $this->getDoctrine()->getManager();
                $em->persist($projet);
                $em->flush();
            }
        }


        return $this->render('projet/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
}
