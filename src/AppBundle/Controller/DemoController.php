<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DemoController extends Controller
{
    public function topArticlesAction($num)
    {
        $articles = 1;
        return $this->render('formularz/topArticles.html.twig', array('articles' => $articles,));
    }
}