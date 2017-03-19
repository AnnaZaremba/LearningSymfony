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

    /**
     * @Route("/ksiazkakucharska/wigilia", name="wigilia")
     * @Template()
     */
    public function wigiliaAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/wielkanoc", name="wielkanoc")
     * @Template()
     */
    public function wielkanocAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/urodziny", name="urodziny")
     * @Template()
     */
    public function urodzinyAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/daniaglowne", name="daniaglowne")
     * @Template()
     */
    public function daniaglowneAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/przekaski", name="przekaski")
     * @Template()
     */
    public function przekaskiAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/desery", name="desery")
     * @Template()
     */
    public function deseryAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/pieczywo", name="pieczywo")
     * @Template()
     */
    public function pieczywoAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/omnie", name="kkomnie")
     * @Template()
     */
    public function omnieAction(Request $request)
    {
        return [];
    }
}