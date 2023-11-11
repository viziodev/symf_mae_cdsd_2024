<?php

namespace App\Form;

use App\Entity\Niveau;
use App\Entity\Filiere;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchFormClasseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('niveau',EntityType::class,[
            "class"=>Niveau::class,
            "placeholder"=>"All",
            "required"=>false,
          
        ])
        ->add('filiere',EntityType::class,[
            "class"=>Filiere::class,
             "placeholder"=>"All",
             "required"=>false,
        ])
        ->add('save',SubmitType::class,[
            "label"=>"Enregistrer",
            "attr"=>[
                "class"=>"btn btn-info btn-sm"
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
