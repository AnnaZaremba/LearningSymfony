<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Kontakt;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
            ->add('wiadomosc', TextType::class)
            ->getForm();

        $form->handleRequest($request);

        return array(
            'form' => $form->createView(),
            'kontakt' => $kontakt,
        );
    }
}