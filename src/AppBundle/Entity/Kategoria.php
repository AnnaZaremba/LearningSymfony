<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="kategoria")
 */
class Kategoria
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nazwa;

    /**
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Przepis", inversedBy="kategorie", cascade={"persist"})
     * @ORM\JoinTable(name="przepiskategoria")
     */
    private $przepisy;

    /**
     * Kategoria constructor.
     * @param $przepisy
     */
    public function __construct($przepisy)
    {
        $this->przepisy = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * @param mixed $nazwa
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getPrzepisy()
    {
        return $this->przepisy;
    }

    /**
     * @param ArrayCollection $przepisy
     */
    public function setPrzepisy(ArrayCollection $przepisy)
    {
        $this->przepisy = $przepisy;
    }

    public function addPrzepis(Przepis $przepis) {
        $this->przepisy[] = $przepis;
    }

}