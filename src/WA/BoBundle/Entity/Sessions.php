<?php

namespace WA\BoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Sessions
 *
 * @ORM\Table(name="sessions", indexes={@ORM\Index(name="movies_id", columns={"movies_id"}), @ORM\Index(name="cinema_id", columns={"cinema_id"})})
 * @ORM\Entity(repositoryClass="WA\BoBundle\Entity\SessionsRepository")
 */
class Sessions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_session", type="datetime", nullable=true)
     */
    private $dateSession;

    /**
     * @var \Movies
     * @Assert\NotBlank(message = "Le movie est vide")
     * @ORM\ManyToOne(targetEntity="Movies", inversedBy="sessions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="movies_id", referencedColumnName="id")
     * })
     */
    private $movies;

    /**
     * @var \Cinema
     * @Assert\NotBlank(message = "Le movie est vide")
     * @ORM\ManyToOne(targetEntity="Cinema", inversedBy="sessions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cinema_id", referencedColumnName="id")
     * })
     */
    private $cinema;




    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateSession
     *
     * @param \DateTime $dateSession
     * @return Sessions
     */
    public function setDateSession($dateSession)
    {
        $this->dateSession = $dateSession;

        return $this;
    }

    /**
     * Get dateSession
     *
     * @return \DateTime 
     */
    public function getDateSession()
    {
        return $this->dateSession;
    }

    /**
     * Set movies
     *
     * @param \WA\BoBundle\Entity\Movies $movies
     * @return Sessions
     */
    public function setMovies(\WA\BoBundle\Entity\Movies $movies = null)
    {
        $this->movies = $movies;

        return $this;
    }

    /**
     * Get movies
     *
     * @return \WA\BoBundle\Entity\Movies 
     */
    public function getMovies()
    {
        return $this->movies;
    }

    /**
     * Set cinema
     *
     * @param \WA\BoBundle\Entity\Cinema $cinema
     * @return Sessions
     */
    public function setCinema(\WA\BoBundle\Entity\Cinema $cinema = null)
    {
        $this->cinema = $cinema;

        return $this;
    }

    /**
     * Get cinema
     *
     * @return \WA\BoBundle\Entity\Cinema 
     */
    public function getCinema()
    {
        return $this->cinema;
    }

    public function __toString()
    {
        return $this->getDateSession()->format("d/m/Y");
    }
}
