<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TwigusController extends Controller
{
    /**
     * @Route("/twigus", name="start")
     * @Template()
     */
    public function startAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/twigus/omnie", name="omnie")
     * @Template()
     */
    public function omnieAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("twigus/kontakt", name="kontakt")
     * @Template()
     */
    public function kontaktAction(Request $request)
    {
        return [];
    }
}