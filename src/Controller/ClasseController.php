<?php

namespace App\Controller;

use App\Repository\ClasseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClasseController extends AbstractController
{    
             //uri ou path        
    #[Route('/classe', name: 'app_classe',methods:["GET"])]
    public function index(ClasseRepository $classeRepository): Response
    {
        $classes=$classeRepository->findBy(['isArchived'=>false]);
        return $this->render('classe/index.html.twig', [
            'classesNotArchived' => $classes,
        ]);
    }
}
