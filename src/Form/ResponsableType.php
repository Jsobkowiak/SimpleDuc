<?php

namespace App\Form;

use App\Entity\Projet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class ResponsableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, ["label" =>"Nom",'attr' => ['class'=> ' shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'], 'label_attr' => ['class'=> 'fw-bold']])
        ->add('prenom', TextType::class, ["label" =>"Prenom",'attr' => ['class'=> ' shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'], 'label_attr' => ['class'=> 'fw-bold']])
        ->add('listeprojet', EntityType::class, [
            'label' => "Projet ",
            'class' => Projet::class,
            'choice_label' => 'Libelle',
            'attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=> 'fw-bold text-dark']
            ])
        ->add('ajouter', SubmitType::class, ["label" => "Ajouter un Responsable",'attr' => ['class'=> ' mt-4 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'], ])
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
