<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\Common\Persistence\ObjectManager;
use  App\Notification\ContactNotification;
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
public function contact(Request $request,ContactNotification $notification): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notify($contact);
            $this->addFlash('success', 'Your email has been sent');
            return $this->redirectToRoute('contact');
        }


        return $this->render('contact/contact.html.twig', [
            'form'         => $form->createView()
        ]);
    }

}