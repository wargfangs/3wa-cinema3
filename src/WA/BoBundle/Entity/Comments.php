<?php

namespace WA\BoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comments
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="WA\BoBundle\Entity\CommentsRepository")
 */
class Comments
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
     * @var integer
     * @Assert\NotBlank(message = "La note est vide", groups={"fullform"})
     * @Assert\Type(
     *      type   = "numeric",
     *      message = "La valeur {{ value }} n est pas un type {{ type }} valide",
     * )
     * @ORM\Column(name="note", type="integer", nullable=true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var integer
     * @Assert\NotBlank(message = "Le state est vide", groups={"fullform"})
     * @Assert\Type(
     *      type   = "numeric",
     *      message = "La valeur {{ value }} n est pas un type {{ type }} valide",
     * )
     * @ORM\Column(name="state", type="integer", nullable=true)
     */
    private $state;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var \User
     * @Assert\NotBlank(message = "L'user_id est vide", groups={"fullform"})
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Movies
     * @Assert\NotBlank(message = "Le movies_id est vide", groups={"fullform"})
     * @ORM\ManyToOne(targetEntity="Movies", inversedBy="comments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="movies_id", referencedColumnName="id")
     * })
     */
    private $movies;



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
     * Set note
     *
     * @param integer $note
     * @return Comments
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Comments
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set state
     *
     * @param integer $state
     * @return Comments
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Comments
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set user
     *
     * @param \WA\BoBundle\Entity\User $user
     * @return Comments
     */
    public function setUser(\WA\BoBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \WA\BoBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set movies
     *
     * @param \WA\BoBundle\Entity\Movies $movies
     * @return Comments
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

    public function __toString()
    {
        return $this->getContent();
    }
}
