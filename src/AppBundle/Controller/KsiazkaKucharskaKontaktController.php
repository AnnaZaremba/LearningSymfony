<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Kontakt;
use AppBundle\Entity\KontaktBaza;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class KsiazkaKucharskaPrzepisyController
 * @package AppBundle\Controller
 *
 * @Route("/ksiazkakucharska")
 */
class KsiazkaKucharskaKontaktController extends Controller
{
    /**
     * @Route("/kontakt", name="ksiazkakucharskakontakt")
     * @Template()
     */
    public function kontaktAction(Request $request)
    {
        $kontakt = new Kontakt();

        $form = $this->createFormBuilder($kontakt)
            ->add('imie', TextType::class)
            ->add('email', TextType::class)
            ->add('temat', TextType::class)
            ->add('wiadomosc', TextareaType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $kontaktBaza = new KontaktBaza();
            $kontaktBaza->setImie($kontakt->getImie());
            $kontaktBaza->setEmail($kontakt->getEmail());
            $kontaktBaza->setTemat($kontakt->getTemat());
            $kontaktBaza->setWiadomosc($kontakt->getWiadomosc());

            $em->persist($kontaktBaza);
            $em->flush();

            return $this->redirectToRoute('kontaktmailwyslany');
        }

        $find = $this->getDoctrine()
            ->getRepository('AppBundle:KontaktBaza')
            ->findAll();

        return array(
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
            'kontakt' => $kontakt,
            'find' => $find
        );
    }

    /**
     * @return array
     *
     * @Route("/kontaktmailwyslany", name="kontaktmailwyslany")
     * @Template()
     */
    public function kontaktMailWyslanyAction()
    {
        return [];
    }
}