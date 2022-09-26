<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\EquipeType;
use App\Entity\Equipe;
use Symfony\Component\HttpFoundation\Request;

class EquipeController extends AbstractController
{
    #[Route('/equipe', name: 'equipe')]
    public function index(request $request): Response
    {
        $form = $this->createForm(EquipeType::class);
        $equipe = new Equipe();

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){

                $nom = $form['libelle']->getData();
                $projet = $form['Projet']->getData();


                $equipe->setLibelle($nom);
                $equipe->setProjet($projet);


                $em = $this->getDoctrine()->getManager();
                $em->persist($equipe);
                $em->flush();
                return $this->redirectToRoute('index');

            }
        }
    
        return $this->render('equipe/index.html.twig', [
            'form' => $form->createView()
        ]);
    }


    #[Route('/modifie-equipe/{id}', name: 'modifie-equipe', requirements:
        ["id"=>"\d+"] )]
    public function modifieEquipe(int $id, Request $request): Response
    {
        $repoEquipe = $this->getDoctrine()->getRepository(Equipe::class);
        $equipe = $repoEquipe->find($id);
        $formEquipe = $this->createForm(EquipeType::class, $equipe);

        if($request->isMethod('POST')){
            $formEquipe->handleRequest($request);
            if ($formEquipe->isSubmitted()&&$formEquipe->isValid()){

                $data = $formEquipe->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($data);
                $em->flush();
                return $this->redirectToRoute('admin');
            }
            else{}
        }
        return $this->render('equipe/modifie-equipe.html.twig', [
            'equipe' => $equipe,
            'form' => $formEquipe->createView()
        ]);
    }



    #[Route('/supprimer-equipe/{id}', name: 'supprimer-equipe', requirements:
        ["id"=>"\d+"] )]
    public function supprimerEquipe(int $id, Request $request): Response
    {
        $repoEquipe = $this->getDoctrine()->getRepository(Equipe::class);
        $equipe = $repoEquipe->find($id);
        $formEquipe = $this->createForm(EquipeType::class, $equipe);

        if($request->isMethod('POST')){
            $formEquipe->handleRequest($request);
            if ($formEquipe->isSubmitted()&&$formEquipe->isValid()){

                $data = $formEquipe->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($data);
                $em->flush();
                return $this->redirectToRoute('admin');
            }
            else{}
        }
        return $this->render('equipe/supprimer-equipe.html.twig', [
            'equipe' => $equipe,
            'form' => $formEquipe->createView()
        ]);
    }

    
}
