<?php

namespace AppBundle\Repository\Doctrine;

use AppBundle\Entity\Przepis as PrzepisEntity;
use AppBundle\Form\Model\Przepis;


class PrzepiRepository extends DoctrineRepository
{
    public function getAllOrderByName()
    {
        return $this->getEntityManager()
            ->getRepository('AppBundle:Przepis')
            ->findBy([], ['nazwa' => 'ASC']);
    }

    public function getOneById($id)
    {
        return $this->getEntityManager()
            ->getRepository('AppBundle:Przepis')
            ->find($id);
    }

    protected function getEntityClassName()
    {
        return 'AppBundle:Przepis';
    }

    public function save(Przepis $przepis)
    {
        $em = $this->getEntityManager();

        $przepisBaza = new PrzepisEntity();
        $przepisBaza->setNazwa($przepis->getNazwa());
        $przepisBaza->setSkladniki($przepis->getSkladniki());
        $przepisBaza->setWykonanie($przepis->getWykonanie());
        $przepisBaza->setZrodlo($przepis->getZrodlo());
        $przepisBaza->setUwagi($przepis->getUwagi());
        $przepisBaza->setKategorie($przepis->getKategorie());

        $em->persist($przepisBaza);
        $em->flush();
    }

    public function update(Przepis $przepis)
    {
        $em = $this->getEntityManager();
        $przepisBaza = $this->find($przepis->getId());

        $przepisBaza->setNazwa($przepis->getNazwa());
        $przepisBaza->setSkladniki($przepis->getSkladniki());
        $przepisBaza->setWykonanie($przepis->getWykonanie());
        $przepisBaza->setZrodlo($przepis->getZrodlo());
        $przepisBaza->setUwagi($przepis->getUwagi());
        $przepisBaza->setKategorie($przepis->getKategorie());

        $em->persist($przepisBaza);
        $em->flush();
    }

    public function delete($id)
    {
        $przepisBaza = $this->find($id);

        $em = $this->getEntityManager();
        $em->remove($przepisBaza);
        $em->flush();
    }
}