<?php
namespace AppBundle\Controller;

use AppBundle\Entity\DaneOsobowe;
use AppBundle\Entity\Osoba;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DaneFormController extends Controller
{
    /**
     * @Route("/daneform", name="daneform")
     * @param Request $request
     * @Template()
     * @return array
     */
    public function newAction(Request $request)
    {
        $osoba = new Osoba();

        $form = $this->createFormBuilder($osoba)
            ->add('imie', TextType::class)
            ->add('nazwisko', TextType::class)
            ->add('wiek', TextType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $daneOsobowe = new DaneOsobowe();
            $daneOsobowe->setImie($osoba->getImie());
            $daneOsobowe->setNazwisko($osoba->getNazwisko());
            $daneOsobowe->setWiek($osoba->getWiek());

            $em->persist($daneOsobowe);
            $em->flush();
        }

        $dane = $this->getDoctrine()
            ->getRepository('AppBundle:DaneOsobowe')
            ->findAll();

        return array(
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
            'osoba' => $osoba,
            'dane' => $dane
        );
    }

    /**
     * @Route("/daneform/usun", name="usun")
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');

        $daneOsobowe = $this->getDoctrine()
            ->getRepository('AppBundle:DaneOsobowe')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($daneOsobowe);
        $em->flush();

        return $this->redirectToRoute("daneform");
    }

    /**
     * @Route("/daneform/edytuj", name="edytuj")
     */
    public function editAction(Request $request)
    {
        $id = $request->get('id');
        $osoba = new Osoba();

        if (isset($id)) {
            /** @var DaneOsobowe $daneOsobowe */
            $daneOsobowe = $this->getDoctrine()
                ->getRepository('AppBundle:DaneOsobowe')
                ->find($id);

            $osoba->setId($daneOsobowe->getId());
            $osoba->setImie($daneOsobowe->getImie());
            $osoba->setNazwisko($daneOsobowe->getNazwisko());
            $osoba->setWiek($daneOsobowe->getWiek());
        }

        $form = $this->createFormBuilder($osoba)
            ->add('id', HiddenType::class)
            ->add('imie', TextType::class)
            ->add('nazwisko', TextType::class)
            ->add('wiek', TextType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $daneOsobowe = $this->getDoctrine()
                ->getRepository('AppBundle:DaneOsobowe')
                ->find($osoba->getId());

            $em = $this->getDoctrine()->getManager();

            $daneOsobowe->setImie($osoba->getImie());
            $daneOsobowe->setNazwisko($osoba->getNazwisko());
            $daneOsobowe->setWiek($osoba->getWiek());

            $em->flush();

            return $this->redirectToRoute("daneform");
        }

        $dane = $this->getDoctrine()
            ->getRepository('AppBundle:DaneOsobowe')
            ->findAll();

        return $this->render('@App/DaneForm/new.html.twig', array(
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
            'osoba' => $osoba,
            'dane' => $dane
        ));
    }
}