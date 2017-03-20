<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Kontakt;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class KontaktformController extends Controller
{
    /**
     * @Route("/kontaktform", name = "kontaktform")
     * @Template()
     */
    public function kontaktformAction(Request $request)
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