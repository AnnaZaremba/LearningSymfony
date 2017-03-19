<?php

namespace AppBundle\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="przepiskategoria")
 */
class PrzepisKategoria
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idprzepis;

    /**
     * @ORM\Column(type="integer")
     */
    private $idkategoria;

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
    public function getIdprzepis()
    {
        return $this->idprzepis;
    }

    /**
     * @param mixed $idprzepis
     */
    public function setIdprzepis($idprzepis)
    {
        $this->idprzepis = $idprzepis;
    }

    /**
     * @return mixed
     */
    public function getIdkategoria()
    {
        return $this->idkategoria;
    }

    /**
     * @param mixed $idkategoria
     */
    public function setIdkategoria($idkategoria)
    {
        $this->idkategoria = $idkategoria;
    }


}