<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = mt_rand(0, 100);

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
    }

    /**
     * @Route("/lucky/number/{nr}", name="numer", requirements={"nr": "\d+"})
     */
    public function number2Action($nr)
    {
        $number = $nr;

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
    }
}