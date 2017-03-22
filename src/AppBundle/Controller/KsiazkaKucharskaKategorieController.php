<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class KsiazkaKucharskaKategorieController
 * @package AppBundle\Controller
 *
 * @Route("/ksiazkakucharska")
 */
class KsiazkaKucharskaKategorieController extends Controller
{
    /**
     * @Route("/{id}", name="kategoriaid", requirements={"id": "\d+"})
     * @Template()
     */
    public function findAction($id)
    {
        $kategoria = $this->getDoctrine()
            ->getRepository('AppBundle:Kategoria')
            ->find($id);

        return [
            'kategoria' => $kategoria,
        ];
    }

    /**
     * @Route("/kategorie", name="kategorie")
     * @Template()
     */
    public function kategorieAction(Request $request)
    {
        $kategorie = $this->getDoctrine()
            ->getRepository('AppBundle:Kategoria')
            ->findBy([], ['nazwa' => 'ASC']);

        return [
            'kategorie' => $kategorie,
        ];
    }

    /**
     * @Route("/sniadanie", name="sniadanie")
     * @Template()
     */
    public function sniadanieAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/obiad", name="obiad")
     * @Template()
     */
    public function obiadAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/kolacja", name="kolacja")
     * @Template()
     */
    public function kolacjaAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/desery", name="desery")
     * @Template()
     */
    public function deseryAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/salatki", name="salatki")
     * @Template()
     */
    public function salatkiAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/pieczywo", name="pieczywo")
     * @Template()
     */
    public function pieczywoAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/przekaski", name="przekaski")
     * @Template()
     */
    public function przekaskiAction(Request $request)
    {
        return [];
    }
}