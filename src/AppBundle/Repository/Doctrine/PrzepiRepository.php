<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 22.03.17
 * Time: 19:32
 */

namespace AppBundle\Repository\Doctrine;


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
}