<?php

namespace App\Controller;

use App\Repository\SexeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/stats", name="personne_stats", methods={"GET"})
     * @return Response
     */
    public function stats(SexeRepository $repository):Response
    {
        $sexes = $repository->findAll();

        $sexecount = [];
        $sexepersonne = [];

        foreach ($sexes as $sexe){
            $sexecount[] = count($sexe->getPersonnes());
            $sexepersonne[] = $sexe->getNom();
        }


        return  $this->render('home/stats.html.twig',[
            'menu' => 'stats',
            'sexecount' => json_encode($sexecount),
            'sexelabel' => json_encode( $sexepersonne)
        ]);
    }
}
