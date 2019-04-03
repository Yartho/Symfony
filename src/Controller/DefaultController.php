<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;


class DefaultController
{

    /**
     * @Route("/", name="homepage")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\RuntimeError
     * @throws \Twiig\Error\SyntaxError
     */
 public function homepageAction(Environment $twig)
 {
     $color = 'blue';

     return new Response($twig->render('Default/homepage.html.twig',
[
             'color' => $color,
             'itemlist' => [1,2,4,5,7,89,77,66],
     'currentDate' => new \DateTime()



         ]
     )

     );

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