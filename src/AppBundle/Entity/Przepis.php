<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 19.03.17
 * Time: 15:49
 */

namespace AppBundle\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="przepis")
 */
class Przepis
{
    private $id;
    private $nazwa;
    private $skladniki;
    private $wykonanie;
    private $zrodlo;
    private $uwagi;

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
    public function getSkladniki()
    {
        return $this->skladniki;
    }

    /**
     * @param mixed $skladniki
     */
    public function setSkladniki($skladniki)
    {
        $this->skladniki = $skladniki;
    }

    /**
     * @return mixed
     */
    public function getWykonanie()
    {
        return $this->wykonanie;
    }

    /**
     * @param mixed $wykonanie
     */
    public function setWykonanie($wykonanie)
    {
        $this->wykonanie = $wykonanie;
    }

    /**
     * @return mixed
     */
    public function getZrodlo()
    {
        return $this->zrodlo;
    }

    /**
     * @param mixed $zrodlo
     */
    public function setZrodlo($zrodlo)
    {
        $this->zrodlo = $zrodlo;
    }

    /**
     * @return mixed
     */
    public function getUwagi()
    {
        return $this->uwagi;
    }

    /**
     * @param mixed $uwagi
     */
    public function setUwagi($uwagi)
    {
        $this->uwagi = $uwagi;
    }


}