<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 19.03.17
 * Time: 15:53
 */

namespace AppBundle\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="kategoria")
 */
class Kategoria
{
    private $id;
    private $nazwa;
    private $opis;

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
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * @param mixed $opis
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;
    }


}