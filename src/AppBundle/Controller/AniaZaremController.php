<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AniaZaremController extends Controller
{
    /**
     * @Route("/aniazarem", name="aniazarem")
     */
    public function indexAction(Request $request)
    {
        return $this->render('aniazarem/aniazarem_index.html.twig', []);
    }
}