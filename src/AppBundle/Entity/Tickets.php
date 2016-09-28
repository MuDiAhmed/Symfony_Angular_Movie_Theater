<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 28/09/16
 * Time: 08:11 م
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="tickets")
 */
class Tickets
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="HallMovieShow", inversedBy="tickets")
     */
    public $hall_movie_show_id;

    /**
     * @ORM\ManyToOne(targetEntity="users", inversedBy="tickets")
     */
    private $user_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $chair_number;

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
     * Set chairNumber
     *
     * @param integer $chairNumber
     *
     * @return Tickets
     */
    public function setChairNumber($chairNumber)
    {
        $this->chair_number = $chairNumber;

        return $this;
    }

    /**
     * Get chairNumber
     *
     * @return integer
     */
    public function getChairNumber()
    {
        return $this->chair_number;
    }

    /**
     * Set hallMovieShowId
     *
     * @param \AppBundle\Entity\HallMovieShow $hallMovieShowId
     *
     * @return Tickets
     */
    public function setHallMovieShowId(\AppBundle\Entity\HallMovieShow $hallMovieShowId = null)
    {
        $this->hall_movie_show_id = $hallMovieShowId;

        return $this;
    }

    /**
     * Get hallMovieShowId
     *
     * @return \AppBundle\Entity\HallMovieShow
     */
    public function getHallMovieShowId()
    {
        return $this->hall_movie_show_id;
    }

    /**
     * Set userId
     *
     * @param \AppBundle\Entity\users $userId
     *
     * @return Tickets
     */
    public function setUserId(\AppBundle\Entity\users $userId = null)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \AppBundle\Entity\users
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}
