<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
   
    /**
     * @Route("/blog",name="blog")
     * @IsGranted("ROLE_USER")
     */
    public function index(): Response
    {
        return $this->render('blog/blog.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
    /**
     * @Route("/",name="home")
     * @IsGranted("ROLE_USER")
     */
    
    public function home(){
        return $this->render('blog/home.html.twig', [
            'controller_name' => 'BlogController',
        ]);

    }
}
