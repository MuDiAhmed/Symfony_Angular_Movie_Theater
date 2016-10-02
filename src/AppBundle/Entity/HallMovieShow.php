<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 28/09/16
 * Time: 05:36 م
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="hall_movie_show")
 */
class HallMovieShow
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="Movies", inversedBy="hallMovieShow")
     * @ORM\JoinColumn(name="movie_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $movie;
    /**
     * @ORM\ManyToOne(targetEntity="Halls", inversedBy="hallMovieShow")
     * @ORM\JoinColumn(name="hall_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $hall;
    /**
     * @ORM\ManyToOne(targetEntity="Shows", inversedBy="hallMovieShow")
     * @ORM\JoinColumn(name="show_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $show;
    /**
     * @ORM\Column(type="decimal")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="Tickets", mappedBy="hallMovieShow")
     */
    public $tickets;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tickets = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set price
     *
     * @param string $price
     *
     * @return HallMovieShow
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set movie
     *
     * @param \AppBundle\Entity\Movies $movie
     *
     * @return HallMovieShow
     */
    public function setMovie(\AppBundle\Entity\Movies $movie = null)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return \AppBundle\Entity\Movies
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set hall
     *
     * @param \AppBundle\Entity\Halls $hall
     *
     * @return HallMovieShow
     */
    public function setHall(\AppBundle\Entity\Halls $hall = null)
    {
        $this->hall = $hall;

        return $this;
    }

    /**
     * Get hall
     *
     * @return \AppBundle\Entity\Halls
     */
    public function getHall()
    {
        return $this->hall;
    }

    /**
     * Set show
     *
     * @param \AppBundle\Entity\Shows $show
     *
     * @return HallMovieShow
     */
    public function setShow(\AppBundle\Entity\Shows $show = null)
    {
        $this->show = $show;

        return $this;
    }

    /**
     * Get show
     *
     * @return \AppBundle\Entity\Shows
     */
    public function getShow()
    {
        return $this->show;
    }

    /**
     * Add ticket
     *
     * @param \AppBundle\Entity\Tickets $ticket
     *
     * @return HallMovieShow
     */
    public function addTicket(\AppBundle\Entity\Tickets $ticket)
    {
        $this->tickets[] = $ticket;

        return $this;
    }

    /**
     * Remove ticket
     *
     * @param \AppBundle\Entity\Tickets $ticket
     */
    public function removeTicket(\AppBundle\Entity\Tickets $ticket)
    {
        $this->tickets->removeElement($ticket);
    }

    /**
     * Get tickets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTickets()
    {
        return $this->tickets;
    }
}
