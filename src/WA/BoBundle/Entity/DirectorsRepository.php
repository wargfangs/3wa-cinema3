<?php

namespace WA\BoBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * DirectorsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DirectorsRepository extends EntityRepository
{
    public function getAllDirectorsByNumber()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT COUNT(d.firstname) FROM WABoBundle:Directors d'
            )
            ->getSingleScalarResult();
    }
}
