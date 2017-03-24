<?php
namespace AppBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Przepis
{
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Pole nie może być puste.")
     */
    private $nazwa;

    /**
     * @var string
     * @Assert\NotBlank(message="Pole nie może być puste.")
     */
    private $skladniki;

    /**
     * @var string
     * @Assert\NotBlank(message="Pole nie może być puste.")
     */
    private $wykonanie;

    /**
     * @var string
     * @Assert\NotBlank(message="Pole nie może być puste.")
     */
    private $zrodlo;

    /**
     * @var string
     * @Assert\NotBlank(message="Pole nie może być puste.")
     */
    private $uwagi;
}