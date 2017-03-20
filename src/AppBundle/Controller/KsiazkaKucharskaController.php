<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class KsiazkaKucharskaController
 * @package AppBundle\Controller
 *
 * @Route("/ksiazkakucharska")
 */
class KsiazkaKucharskaController extends Controller
{
    /**
     * @Route("/", name="kk")
     * @Template()
     */
    public function startAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/omnie", name="kkomnie")
     * @Template()
     */
    public function omnieAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/okuchni", name="okuchni")
     * @Template()
     */
    public function okuchniAction(Request $request)
    {
        return [];
    }
}