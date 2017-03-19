<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class KsiazkaKucharskaController extends Controller
{
    /**
     * @Route("/ksiazkakucharska", name="kk")
     * @Template()
     */
    public function startAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/sniadanie", name="sniadanie")
     * @Template()
     */
    public function sniadanieAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/obiad", name="obiad")
     * @Template()
     */
    public function obiadAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/kolacja", name="kolacja")
     * @Template()
     */
    public function kolacjaAction(Request $request)
    {
        return [];
    }
}