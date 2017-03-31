<?php

namespace AppBundle\Controller;

use AppBundle\Repository\Doctrine\KategoriaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class KsiazkaKucharskaSecurityController extends Controller
{
    /**
     * @Route("/logowanie", name="logowanie")
     * @Template()
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // pobranie błędu logowania, jeśli sie taki pojawił
        $error = $authenticationUtils->getLastAuthenticationError();

        // nazwa użytkownika ostatnio wprowadzona przez aktualnego użytkownika
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            '@App/KsiazkaKucharskaSecurity/login.html.twig',
            array(
                // nazwa użytkownika ostatnio wprowadzona przez aktualnego użytkownika
                'last_username' => $lastUsername,
                'error'         => $error,
                'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
            )
        );
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