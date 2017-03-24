<?php
namespace AppBundle\Controller;

use AppBundle\Form\Model\Kategoria;
use AppBundle\Entity\Kategoria as KategoriaEntity;
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
 * @Route("/ksiazkakucharska")
 */
class KsiazkaKucharskaDodajKategorieController extends Controller
{
    /**
     * @Route("/dodajkategorie", name="dodajkategorie")
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
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName()
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
}