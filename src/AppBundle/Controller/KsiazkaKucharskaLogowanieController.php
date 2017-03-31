<?php

namespace AppBundle\Controller;

use AppBundle\Form\Model\Login;
use AppBundle\Entity\Login as LoginBaza;
use AppBundle\Repository\Doctrine\KategoriaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class KsiazkaKucharskaLogowanieController
 * @package AppBundle\Controller
 * @Route("/logowanie")
 */

class KsiazkaKucharskaLogowanieController extends Controller
{
    /**
     * @Route("/", name="logowanie")
     * @Template()
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function logowanieAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // pobranie błędu logowania, jeśli sie taki pojawił
        $error = $authenticationUtils->getLastAuthenticationError();

        $login = new Login();

        $form = $this->createFormBuilder($login)
            ->add('nazwa', TextType::class)
            ->add('haslo', TextType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $loginBaza = new LoginBaza();
            $loginBaza->setNazwa($login->getNazwa());
            $loginBaza->setHaslo($login->getHaslo());

            $em->persist($loginBaza);
            $em->flush();

            return $this->redirectToRoute('zalogowwany');
        }

        $find = $this->getDoctrine()
            ->getRepository('AppBundle:Login')
            ->findAll();

        return $this->render(
            'AppBundle:KsiazkaKucharskaLogowanie:logowanie.html.twig',
            array(

                'error'         => $error,
                'form' => $form->createView(),
                'login' => $login,
                'isValid' => $form->isValid(),
                'find' => $find,
                'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
            )
        );
    }

    /**
     * @return array
     *
     * @Route("/zalogowany", name="zalogowwany")
     * @Template()
     */
    public function zalogowanyAction()
    {
        return [
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName()
        ];
    }

    /**
     * @Route("/logowanie/login_check", name="login_check")
     */
    public function loginCheckAction()
    {
// ta akcja nie będzie wykonywana,
// ponieważ trasa jest wykorzystywana przez system bezpieczeństwa
    }
}