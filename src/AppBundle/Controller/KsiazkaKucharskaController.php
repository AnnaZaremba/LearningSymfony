<?php
namespace AppBundle\Controller;

use AppBundle\Repository\Doctrine\KategoriaRepository;
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
     * @Route("/", name="ksiazkakucharska")
     * @Template()
     */
    public function startAction(Request $request)
    {
        return [
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName()
        ];
    }

    /**
     * @Route("/omnie", name="ksiazkakucharskaomnie")
     * @Template()
     */
    public function omnieAction(Request $request)
    {
        return [
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName()
        ];
    }

    /**
     * @Route("/okuchni", name="ksiazkakucharskaokuchni")
     * @Template()
     */
    public function okuchniAction(Request $request)
    {
        return [
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName()
        ];
    }
}