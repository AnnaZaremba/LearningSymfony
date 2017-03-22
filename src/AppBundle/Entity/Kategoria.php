<?php

namespace AppBundle\Entity;

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
     * @param mixed $przepisy
     */
    public function setPrzepisy($przepisy)
    {
        $this->przepisy = $przepisy;
    }


}