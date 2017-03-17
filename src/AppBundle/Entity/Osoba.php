<?php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Osoba
{
    /**
     * @var string
     * @Assert\NotBlank(message="Pole nie może być puste.")
     * @Assert\Length(
     *     min="2",
     *     minMessage="Pole nie może mieć mniej niż 2 znaki.",
     *     max="128",
     *     maxMessage="Pole nie może mieć więcej niż 128 znaków."
     * )
     */
    private $imie;

    /**
     * @var string
     * @Assert\NotBlank(message="Pole nie może być puste.")
     * @Assert\Length(
     *     min="2",
     *     minMessage="Pole nie może mieć mniej niż 2 znaki.",
     *     max="128",
     *     maxMessage="Pole nie może mieć więcej niż 128 znaków."
     * )
     */
    private $nazwisko;

    /**
     * @var int
     * @Assert\NotBlank(message="Pole nie może być puste.")
     * @Assert\Regex(
     *     pattern="/^[0-9]\d*$/",
     *     message="Pole musi być liczbą."
     * )
     */
    private $wiek;

    /**
     * @return mixed
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * @param mixed $imie
     */
    public function setImie($imie)
    {
        $this->imie = $imie;
    }

    /**
     * @return mixed
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * @param mixed $nazwisko
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;
    }

    /**
     * @return mixed
     */
    public function getWiek()
    {
        return $this->wiek;
    }

    /**
     * @param mixed $wiek
     */
    public function setWiek($wiek)
    {
        $this->wiek = $wiek;
    }


}