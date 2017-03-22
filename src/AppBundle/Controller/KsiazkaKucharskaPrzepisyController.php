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
 * @Route("/ksiazkakucharska/przepisy")
 */
class KsiazkaKucharskaPrzepisyController extends Controller
{
    /**
     * @Route("/{id}", name="przepisid", requirements={"id": "\d+"})
     * @Template()
     */
    public function findAction($id)
    {
        $przepis = $this->getDoctrine()
            ->getRepository('AppBundle:Przepis')
            ->find($id);

        return [
            'przepis' => $przepis,
        ];
    }

    /**
     * @Route("/", name="przepisy")
     * @Template()
     */
    public function przepisyAction(Request $request)
    {
        $dane = $this->getDoctrine()
            ->getRepository('AppBundle:Przepis')
            ->findBy([], ['nazwa' => 'ASC']);

        $kategorie = $this->getDoctrine()
            ->getRepository('AppBundle:Kategoria')
            ->findBy([], ['nazwa' => 'ASC']);

        return [
            'dane' => $dane,
            'kategorie' => $kategorie,
        ];

    }
}