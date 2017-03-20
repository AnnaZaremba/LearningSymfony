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
     * @param $id
     * @return array
     *
     * @Route("/{id}", name="przepisid", requirements={"id": "\d+"})
     * @Template()
     */
    public function findAction($id)
    {
        return array(
            'id' => $id,
        );
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

        return array(
            'dane' => $dane,
        );
    }
}