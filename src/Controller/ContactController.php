<?php

namespace App\Controller;

use App\Entity\Property;
use Doctrine\Common\Persistence\ObjectManager;
#use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
   
    public function __construct( ObjectManager $em){ 
        $this->em = $em;
    }
    /**
     * @Route("/contact",name="contact")
     * return Response
     */
    public function contact(): Response
    {
        return $this->render('contact/contact.html.twig');
    }

}