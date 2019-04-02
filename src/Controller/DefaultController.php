<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;


class DefaultController
{

    /**
     * @Route("/", name="homepage")
     * @return Response
     */
 public function homepageAction(Environment $twig)
 {
     return new Response($twig->render('Default/homepage.html.twig'));

 }



    /**
     * @Route("/terms", name="terms_of_service")
     * @return Response
     */
    public function termOfServiceAction()
    {
        return new Response('This is the terms...' );


    }
}