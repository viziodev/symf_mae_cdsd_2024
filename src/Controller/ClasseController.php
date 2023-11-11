<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Form\ClasseType;
use App\Form\SearchFormClasseType;
use App\Repository\ClasseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClasseController extends AbstractController
{    
             //uri ou path        
    #[Route('/classe', name: 'app_classe',methods:["GET","POST"])]
    public function index(Request $request,ClasseRepository $classeRepository): Response
    {
      
        $form=$this->createForm(SearchFormClasseType::class);
        $form->handleRequest($request);
        $filtre=[
           
            'isArchived'=>false
        ];
        if ($form->isSubmitted()) {
            if( $form->get("niveau")->getData()!=null) {
                $filtre["niveau"]=$form->get("niveau")->getData();
            }
            if( $form->get("filiere")->getData()!=null) {
                $filtre["filiere"]=$form->get("filiere")->getData();
            }
        }
        $classes=$classeRepository->findBy($filtre);
        return $this->render('classe/index.html.twig', [
            'classesNotArchived' => $classes,
            "form"=> $form->createView()
        ]);
    }

    #[Route('/classe/save/{id?}', name: 'app_classe_save',methods:["GET","POST"])]
    public function saveAndUpdate($id,Request $request,EntityManagerInterface $manager,ClasseRepository $classeRepository): Response
    {
      if($id==null){
        $classe=new Classe();

      }else{
        $classe=$classeRepository->find($id);
      }
       
       
        $form=$this->createForm(ClasseType::class, $classe);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($classe);
            $manager->flush();
        }
        return $this->render('classe/form.html.twig', [
           "form"=> $form->createView()
        ]);
    }
}
