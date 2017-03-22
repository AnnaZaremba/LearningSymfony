<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class KsiazkaKucharskaDaniaGlowneController
 * @package AppBundle\Controller
 *
 * @Route("/ksiazkakucharska/kategoria")
 */
class KsiazkaKucharskaDaniaGlowneController extends Controller
{
    /**
     * @Route("/daniaglowne", name="daniaglowne")
     * @Template()
     */
    public function daniaglowneAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/makarony", name="makarony")
     * @Template()
     */
    public function makaronyAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/miesa", name="miesa")
     * @Template()
     */
    public function miesaAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ryby", name="ryby")
     * @Template()
     */
    public function rybyAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/zupy", name="zupy")
     * @Template()
     */
    public function zupyAction(Request $request)
    {
        return [];
    }
}