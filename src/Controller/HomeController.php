<?php

namespace App\Controller;

use App\Entity\Verbs;
use App\Repository\VerbsRepository;
use App\repository\Conjugaisons;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class HomeController extends AbstractController
{
   
    private $verbs;
    public function __construct(VerbsRepository $verbs, ObjectManager $em)
    {
        $this->verbs = $verbs;
        $this->em = $em;
    }
    /**
     * @Route("/home",name="home")
     * return Response
     */
public function index(Request $request,PaginatorInterface $paginator): Response
    {
        $verbs = $paginator->paginate(
            $this->verbs->findAllQuery(),
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('home/index.html.twig',[
            'verbs' => $verbs,
        ]);
    }

}