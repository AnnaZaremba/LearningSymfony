<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/lucky")
 */
class LuckyController extends Controller
{
    /**
     * @Route("/number")
     */
    public function numberAction()
    {
        $number = mt_rand(0, 100);

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
    }

    /**
     * @Route("/number/{nr}", name="numer", requirements={"nr": "\d+"})
     */
    public function number2Action($nr)
    {
        $number = $nr;

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
    }
}