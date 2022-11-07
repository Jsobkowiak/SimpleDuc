<?php

namespace App\Controller;

use App\Entity\Responsable;
use App\Entity\Salarié;
use App\Form\ResponsableType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResponsableController extends AbstractController
{
    
    #[Route('/salarie', name: 'app_salarie')]
    public function index(Request $request): Response
    {

        $responsable = new Responsable();
        $form = $this->createForm(ResponsableType::class);


        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){

                $nom = $form['nom']->getData();
                $prenom = $form['prenom']->getData();
                $projet = $form['listeprojet']->getData();

                dump($projet);
                $responsable->setNom($nom);
                $responsable->setPrenom($prenom);
                $responsable->setProjet($projet);


                $em = $this->getDoctrine()->getManager();
                $em->persist($responsable);
                $em->flush();
                return $this->redirectToRoute('index');

            }
        }

        return $this->render('salarie/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
