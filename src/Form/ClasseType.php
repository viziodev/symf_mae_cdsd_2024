<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Filiere;
use App\Entity\Module;
use App\Entity\Niveau;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

class ClasseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomClasse',TextType::class,[
             "required"=>false,
             'constraints'=>[
               new NotBlank([
                "message"=>"Champ obligatoire"
               ]
             
               )
             ]
            ])
            ->add('niveau',EntityType::class,[
                "class"=>Niveau::class,
                "placeholder"=>"All",
                "expanded"=>true,
            ])
            ->add('filiere',EntityType::class,[
                "class"=>Filiere::class,
                 "placeholder"=>"All",
             
            ])
            ->add('modules',EntityType::class,[
                 "class"=>Module::class,
                 "placeholder"=>"All",
                 "expanded"=>true,
                 "multiple"=>true,
              
             
            ])
            ->add('isArchived')
            ->add('save',SubmitType::class,[
                "label"=>"Enregistrer",
                "attr"=>[
                    "class"=>"btn btn-info btn-sm float-right"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Classe::class,
            'constraints'=>[
                new UniqueEntity([
                    'fields' => ['nomClasse'],
                    "message"=>"Le nom de la classe est unique"
                ])
            ]
        ]);
    }
}
