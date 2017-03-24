<?php
namespace AppBundle\Controller;

use AppBundle\Form\Model\Przepis;
use AppBundle\Entity\Przepis as PrzepisEntity;
use AppBundle\Repository\Doctrine\KategoriaRepository;
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
 * @Route("/ksiazkakucharska/dodajprzepis")
 */
class KsiazkaKucharskaDodajPrzepisController extends Controller
{
    /**
     * @Route("/", name="dodajprzepis")
     * @Template()
     */
    public function dodajPrzepisAction(Request $request)
    {
        $przepis = new Przepis();

        $form = $this->createFormBuilder($przepis)
            ->add('nazwa', TextType::class)
            ->add('skladniki', TextareaType::class)
            ->add('wykonanie', TextareaType::class)
            ->add('zrodlo', TextType::class)
            ->add('uwagi', TextType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $przepisBaza = new PrzepisEntity();
            $przepisBaza->setNazwa($przepis->getNazwa());
            $przepisBaza->setSkladniki($przepis->getSkladniki());
            $przepisBaza->setWykonanie($przepis->getWykonanie());
            $przepisBaza->setZrodlo($przepis->getZrodlo());
            $przepisBaza->setUwagi($przepis->getUwagi());

            $em->persist($przepisBaza);
            $em->flush();

            return $this->redirectToRoute('przepisdodany');
        }

        $find = $this->getDoctrine()
            ->getRepository('AppBundle:Przepis')
            ->findAll();

        return array(
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
            'przepis' => $przepis,
            'find' => $find,
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName()
        );
    }

    /**
     * @return array
     *
     * @Route("/przepisdodany", name="przepisdodany")
     * @Template()
     */
    public function przepisDodanyAction()
    {
        return [
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName()
        ];
    }
}