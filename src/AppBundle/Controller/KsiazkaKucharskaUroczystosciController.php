<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UroczystosciController
 * @package AppBundle\Controller
 *
 * @Route("/ksiazkakucharska/uroczystosci")
 */
class KsiazkaKucharskaUroczystosciController extends Controller
{
    /**
     * @Route("/", name="uroczystosci")
     * @Template()
     */
    public function uroczystosciAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/wigilia", name="wigilia")
     * @Template()
     */
    public function wigiliaAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("wielkanoc", name="wielkanoc")
     * @Template()
     */
    public function wielkanocAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("urodziny", name="urodziny")
     * @Template()
     */
    public function urodzinyAction(Request $request)
    {
        return [];
    }
}