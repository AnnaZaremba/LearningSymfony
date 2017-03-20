<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Kontakt;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
     * @Route("/ksiazkakucharska/przepisy", name="przepisy")
     * @Template()
     */
    public function przepisyAction(Request $request)
    {
        $dane = $this->getDoctrine()
            ->getRepository('AppBundle:Przepis')
            ->findAll();

        return $this->render('@App/KsiazkaKucharska/przepisy.html.twig', array(
            'dane' => $dane,
        ));
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
     * @Route("/ksiazkakucharska/desery", name="desery")
     * @Template()
     */
    public function deseryAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/salatki", name="salatki")
     * @Template()
     */
    public function salatkiAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/uroczystosci", name="uroczystosci")
     * @Template()
     */
    public function uroczystosciAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/uroczystosci/wigilia", name="wigilia")
     * @Template()
     */
    public function wigiliaAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/uroczystosci/wielkanoc", name="wielkanoc")
     * @Template()
     */
    public function wielkanocAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/uroczystosci/urodziny", name="urodziny")
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
     * @Route("/ksiazkakucharska/daniaglowne/makarony", name="makarony")
     * @Template()
     */
    public function makaronyAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/daniaglowne/miesa", name="miesa")
     * @Template()
     */
    public function miesaAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/daniaglowne/ryby", name="ryby")
     * @Template()
     */
    public function rybyAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/daniaglowne/zupy", name="zupy")
     * @Template()
     */
    public function zupyAction(Request $request)
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
     * @Route("/ksiazkakucharska/przekaski", name="przekaski")
     * @Template()
     */
    public function przekaskiAction(Request $request)
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

    /**
     * @Route("/ksiazkakucharska/okuchni", name="okuchni")
     * @Template()
     */
    public function okuchniAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/ksiazkakucharska/kontakt", name="kkkontakt")
     * @Template()
     */
    public function kontaktAction(Request $request)
    {
        $kontakt = new Kontakt();

        $form = $this->createFormBuilder($kontakt)
            ->add('imie', TextType::class)
            ->add('email', TextType::class)
            ->add('wiadomosc', TextType::class)
            ->getForm();

        $form->handleRequest($request);

        return array(
            'form' => $form->createView(),
            'kontakt' => $kontakt,
        );
    }
}