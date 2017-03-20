<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class KsiazkaKucharskaPrzepisyController
 * @package AppBundle\Controller
 *
 * @Route("/ksiazkakucharska")
 */
class KsiazkaKucharskaPrzepisyController extends Controller
{
    /**
     * @Route("/przepisy", name="przepisy")
     * @Template()
     */
    public function przepisyAction(Request $request)
    {
        $dane = $this->getDoctrine()
            ->getRepository('AppBundle:Przepis')
            ->findAll();

        return $this->render('@App/KsiazkaKucharskaPrzepisy/przepisy.html.twig', array(
            'dane' => $dane,
        ));
    }
}