<?php

namespace WA\BoBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MoviesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MoviesRepository extends EntityRepository
{
    public function getAllMoviesById()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT m FROM WABoBundle:Movies m ORDER BY m.id DESC'
            )
            ->getResult();
    }

    public function getAllMoviesByNumber()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT COUNT(m) FROM WABoBundle:Movies m'
            )
            ->getSingleScalarResult();
    }

    public function getCatFantastique()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT COUNT(m) FROM WABoBundle:Movies m
                JOIN m.categories ca
                WHERE ca.id=1'
            )
            ->getSingleScalarResult();
    }

    public function getCatSF()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT COUNT(m) FROM WABoBundle:Movies m
                JOIN m.categories ca
                WHERE ca.id=7'
            )
            ->getSingleScalarResult();
    }

    public function getCatAction()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT COUNT(m) FROM WABoBundle:Movies m
                JOIN m.categories ca
                WHERE ca.id=2'
            )
            ->getSingleScalarResult();
    }

    public function getCatThriller()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT COUNT(m) FROM WABoBundle:Movies m
                JOIN m.categories ca
                WHERE ca.id=8'
            )
            ->getSingleScalarResult();
    }

    public function getCatAventure()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT COUNT(m) FROM WABoBundle:Movies m
                JOIN m.categories ca
                WHERE ca.id=9'
            )
            ->getSingleScalarResult();
    }

    public function getMoviesByView()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT m, m.views, m.title
                FROM WABoBundle:Movies m
                ORDER BY m.views DESC
             '
            )
            ->setMaxResults(5)
            ->getResult();
    }

    public function getMovieAndCinema()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT m,ci FROM WABoBundle:Movies m
                JOIN m.cinemas ci
             '
            )
            ->getResult();
    }

    public function getMoviesCover()
    {

        return $this->getEntityManager()
            ->createQuery(
                'SELECT m FROM WABoBundle:Movies m
                 WHERE m.cover = 1
                 AND m.visible = 1
                 AND m.dateRelease
                 BETWEEN :date
                 AND CURRENT_TIMESTAMP() '
            )
            ->setParameter('date', new \DateTime('-15 days'))
            ->getResult();
    }

    public function getAnticipatedMovies()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT m FROM WABoBundle:Movies m
                 WHERE m.dateRelease > CURRENT_TIMESTAMP()
                 AND m.notePresse >= 4'
            )
            ->getResult();
    }

    public function getMovieSession()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT m.title AS movie, m.image AS movieimage, s.dateSession AS seance, ci.title AS cinema
                FROM WABoBundle:Movies m
                LEFT JOIN m.sessions s
                LEFT JOIN m.cinemas ci
                WHERE s.dateSession >= CURRENT_TIMESTAMP()
                AND ci IS NOT NULL
                GROUP BY ci.id
                 '
            )
            ->getResult();
    }

    /**
     * Get Active Movies
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getActiveMoviesBuilder()
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder('m')
            ->select('m')
            ->from('WA\BoBundle\Entity\Movies', 'm')
            ->orderBy('m.id', 'DESC');


        return $queryBuilder;
    }



}
