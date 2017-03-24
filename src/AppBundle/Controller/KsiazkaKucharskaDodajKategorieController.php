<?php
namespace AppBundle\Controller;

use AppBundle\Form\Model\Kategoria;
use AppBundle\Entity\Kategoria as KategoriaEntity;
use AppBundle\Repository\Doctrine\KategoriaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class KsiazkaKucharskaPrzepisyController
 * @package AppBundle\Controller
 *
 * @Route("/ksiazkakucharska/dodajkategorie")
 */
class KsiazkaKucharskaDodajKategorieController extends Controller
{
    /**
     * @Route("/", name="dodajkategorie")
     * @Template()
     */
    public function dodajKategorieAction(Request $request)
    {
        $kategoria = new Kategoria();

        $form = $this->createFormBuilder($kategoria)
            ->add('nazwa', TextType::class)
            ->add('image', TextareaType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $kategoriaBaza = new KategoriaEntity();
            $kategoriaBaza->setNazwa($kategoria->getNazwa());
            $kategoriaBaza->setImage($kategoria->getImage());

            $em->persist($kategoriaBaza);
            $em->flush();

            return $this->redirectToRoute('kategoriadodana');
        }

        $find = $this->getDoctrine()
            ->getRepository('AppBundle:Kategoria')
            ->findAll();

        return array(
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
            'kategoria' => $kategoria,
            'find' => $find,
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
        );
    }

    /**
     * @return array
     *
     * @Route("/kategoriadodana", name="kategoriadodana")
     * @Template()
     */
    public function kategoriaDodanaAction()
    {
        return [
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName()
        ];
    }

    /**
     * @Route("/usun", name="usunkategorie")
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');

        $kategoriaBaza = $this->getDoctrine()
            ->getRepository('AppBundle:Kategoria')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($kategoriaBaza);
        $em->flush();

        return $this->redirectToRoute("dodajkategorie");
    }

    /**
     * @Route("/edytuj", name="edytujkategorie")
     */
    public function editAction(Request $request)
    {
        $id = $request->get('id');
        $kategoria = new Kategoria();

        if (isset($id)) {
            /** @var KategoriaEntity $kategoriabaza */
            $kategoriabaza = $this->getDoctrine()
                ->getRepository('AppBundle:Kategoria')
                ->find($id);

            $kategoria->setId($kategoriabaza->getId());
            $kategoria->setNazwa($kategoriabaza->getNazwa());
            $kategoria->setImage($kategoriabaza->getImage());
        }

        $form = $this->createFormBuilder($kategoria)
            ->add('id', HiddenType::class)
            ->add('nazwa', TextType::class)
            ->add('image', TextType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $kategoriabaza = $this->getDoctrine()
                ->getRepository('AppBundle:Kategoria')
                ->find($kategoria->getId());

            $em = $this->getDoctrine()->getManager();

            $kategoriabaza->setNazwa($kategoria->getNazwa());
            $kategoriabaza->setImage($kategoria->getImage());

            $em->flush();

            return $this->redirectToRoute("dodajkategorie");
        }

        $dane = $this->getDoctrine()
            ->getRepository('AppBundle:Kategoria')
            ->findAll();

        return $this->render('@App/KsiazkaKucharskaDodajKategorie/dodajKategorie.html.twig', array(
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
            'kategoria' => $kategoria,
            'dane' => $dane,
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
        ));
    }
}