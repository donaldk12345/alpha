<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, MailerInterface $mailer)
    {
        $form=$this->createForm(ContactType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
           $contact=$form->getData();
           $message=(new Email()) 
           ->setFrom($contact['email'])
           ->setTo('fotsoyvesdonald@gmail.com')
           ->setBody(
               $this->renderView(
                   'emails/emails.html.twig', compact('contact')
               ),
               'text/html'
           );
           $mailer->send($message);
           $this->addFlash(
           'message ',
           'Le message à été bien envoyer !'
           );
           
        }


        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
